<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Comment;

class CommentManager extends Database
{

    /**
     * Renvoie tous les commentaires 
     */
    public function commentsAll($currentPage, $perPage)
    {
        $comments = [];
        $req = 'SELECT comment_id as id, post_id as postId, comment_author as author, comment_content as content, DATE_FORMAT(comment_date, \'%d/%m/%Y\') as date, comment_report as report 
                FROM comments 
                ORDER BY comment_id 
                DESC 
                LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'';

                $result = $this->runReq($req,[$currentPage, $perPage]);
                if(!$result){
                    return $comments;
                }
                foreach($result as $comment)
                {
                    $comments[] = new Comment($comment);
                }
                return $comments; 

    }

    /**
     * Renvoie tous les commentaires par ordre de signalement 
     */
    public function getAllCommentsPerReport($currentPage, $perPage)
    {
        $commentsWithReporting = [];
        $req = 'SELECT comment_id as id, post_id as postId, comment_author as author, comment_content as content, comment_date as date, comment_report as report 
        FROM comments 
        WHERE comment_report > 0 
        ORDER BY comment_report DESC 
        LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'';

        $result = $this->runReq($req,[$currentPage, $perPage]);
        // var_dump($result);
        // die();
        if(!$result){
            return $commentsWithReporting;
        }
        foreach($result as $comment)
        {
            $commentsWithReporting[] = new Comment($comment);
        }
        return $commentsWithReporting;  
    }

    /**
     * Compte la totalité des commentaires enregistrés dans la bdd
     */
    public function countComments()
    {
        $nbComments='';
        $req = 'SELECT COUNT(*) AS nbComments  FROM comments';
        $result = $this->runReq($req);
        if(!$result){
            return $nbComments;
        }
        foreach($result as $value){
            $nbComments = $value['nbComments'];
        }
        // var_dump($nbComments);
        // exit;
        return $nbComments;
    }

    /**
     * Permet de définir le nombre de commentaires affichés par page
     */
    public function countPages($nbComments, $perPage)
    {
        $nbPages = ceil($nbComments / $perPage);
        return $nbPages;
    }

    // Renvoie l'ensemble des commentaires associés à un billet
    public function getComments($postId)
    {
        $comments = [];
        $req = 'SELECT comment_id as id, comment_author as author, comment_content as content, DATE_FORMAT(comment_date, \'%d/%m/%Y\') as date 
                FROM comments 
                WHERE post_id=?';

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

    // Renvoie un seul commentaire 
    public function getComment($id)
    {
        $req = 'SELECT comment_id as id, comment_author as author, comment_content as content, DATE_FORMAT(comment_date, \'%d/%m/%Y\') as date, comment_report as report 
                FROM comments 
                WHERE comment_id=?';

        $comment = $this->show($req, [$id]);

        return new Comment($comment) ;   
    }

    // Ajoute un commentaire dans la BDD (espace users)
    public function addComment($postId, $author, $content)
    {
        $req = 'INSERT INTO comments(post_id, comment_author, comment_content, comment_date) 
                VALUES (?, ?, ?,NOW())';
                
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

