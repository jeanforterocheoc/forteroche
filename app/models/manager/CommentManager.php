<?php
class CommentManager extends Database
{
    // Renvoie tous les commentaires
    public function getAllComments()
    {
        $comments = [];
        $req = 'SELECT comment_id as id, post_id as postId, comment_author as author, comment_content as content, comment_date as date, comment_report as report FROM comments ORDER BY comment_report DESC ';
        $result = $this->runReq($req);
        // var_dump($result);
        // die();
        if(!$result){
            return $comments;
        }
        foreach($result as $comment)
        {
            $comments[] = new Comment($comment);
        }
        return $comments;  

    }

    // Renvoie l'ensemble des commentaires associés à un billet
    public function getComments($postId)
    {
        $comments = [];
        $req = 'SELECT comment_id as id, comment_author as author, comment_content as content, comment_date as date FROM comments WHERE post_id=?';
        $result = $this->runReq($req, [$postId]);
        if(!$result){
            return $comments;
        }
        foreach($result as $comment)
        {
            $comments[] = new Comment($comment);
        }
        return $comments;  
    }

    // Renvoie un commentaire en particulier
    public function getComment($id)
    {
        $req = 'SELECT comment_id as id, comment_author as author, comment_content as content, comment_date as date, comment_report as report FROM comments WHERE comment_id=?';       
        $comment = $this->show($req, [$id]);
        // var_dump($comment);
        // die();
        return new Comment($comment) ;   
    }

    // Ajoute un commentaire dans la BDD (espace users)
    public function addComment($postId, $author, $content)
    {
        $req = 'INSERT INTO comments(post_id, comment_author, comment_content, comment_date) VALUES (?, ?, ?,NOW())';
        $result = $this->ina($req, [$postId, $author, $content]);
    
        return $result;
    }

    // Ajoute un signalement pour modération (espace users)
    public function reportComment($commentId)
    {
        $req = 'UPDATE comments SET comment_report = comment_report + 1 WHERE comment_id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    // Validation d'un commentaire (espace admin)
    public function validateComment($commentId)
    {
        $req = 'UPDATE comments SET comment_report = 0 WHERE comment_id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    // suppression d'un commentaire (espace admin)
    public function deleteComment($commentId)
    {
        $req = 'DELETE FROM comments WHERE comment_id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    
    
}

