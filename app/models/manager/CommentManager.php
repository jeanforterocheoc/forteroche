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
        $req = 'SELECT *
                FROM comments 
                ORDER BY id 
                DESC 
                LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'';

        // // $req = 'SELECT chapters.title, comments.id, comments.chapter_id, comments.author, comments.content, comments.date, comments.report
        // $req = 'SELECT *                
        //         FROM chapters
        //         LEFT OUTER JOIN comments
        //         ON chapters.chapter_id = comments.chapter_id
        //         -- ORDER BY id
        //         -- DESC
        //         LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'
        //         ';
                
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
        $req = 'SELECT id, chapter_id, author, content, DATE_FORMAT(date, \'%d/%m/%Y\') as date, report 
        FROM comments 
        WHERE report > 0 
        ORDER BY report DESC 
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
    public function getComments($chapterId)
    {
        $comments = [];
        $req = 'SELECT id, author, content, DATE_FORMAT(date, \'%d/%m/%Y\') as date 
                FROM comments 
                WHERE chapter_id = ?';

        $result = $this->runReq($req, [$chapterId]);
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
        $req = 'SELECT id, author, content, DATE_FORMAT(date, \'%d/%m/%Y\') as date, report 
                FROM comments 
                WHERE id = ?';

        $comment = $this->show($req, [$id]);

        return new Comment($comment) ;   
    }

    // Ajoute un commentaire dans la BDD (espace users)
    public function addComment($chapterId, $author, $content)
    {
        $req = 'INSERT INTO comments(chapter_id, author, content, date) 
                VALUES (?, ?, ?,NOW())';
                
        $result = $this->ina($req, [$chapterId, $author, $content]);
    
        return $result;
    }

    // Ajoute un signalement pour modération (espace users)
    public function reportComment($commentId)
    {
        $req = 'UPDATE comments SET report = report + 1 WHERE id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    // Validation d'un commentaire (espace admin)
    public function validateComment($commentId)
    {
        $req = 'UPDATE comments SET report = 0 WHERE id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    // suppression d'un commentaire (espace admin)
    public function deleteComment($commentId)
    {
        $req = 'DELETE FROM comments WHERE id = ?';
        $result = $this->ina($req, [$commentId]);
        return $result;
    }

    
    
}

