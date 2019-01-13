<?php
class CommentManager extends Database
{
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

    // Ajoute un commentaire dans la BDD
    public function addComment($postId, $author, $content)
    {
        $req = 'INSERT INTO comments(post_id, comment_author, comment_content, comment_date) VALUES (?, ?, ?,NOW())';
        $result = $this->ina($req, [$postId, $author, $content]);
    
        return $result;
    }

    // Ajoute un commentaire pour modération
    public function reportComment($commentId)
    {
        $req = 'UPDATE comments SET comment_report = comment_report + 1 WHERE comment_id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }


    public function getComment($id)
    {
        
        $req = 'SELECT comment_id as id, comment_author as author, comment_content as content, comment_date as date, comment_report as report FROM comments WHERE comment_id=?';       
        $comment = $this->show($req, [$id]);
        // var_dump($comment);
        // die();
        return new Comment($comment) ;  
         
    }
    
}

