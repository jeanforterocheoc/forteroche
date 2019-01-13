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

    
}

