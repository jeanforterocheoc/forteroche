<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Post;

class ChapterManager extends Database
{ 

     // Affiche l'ensemble des chapitres
     public function getAllChapters()
     {
         $posts = [];
         $req = 'SELECT post_id as id, post_title as title, post_content as content, DATE_FORMAT (post_date, \'%d/%m/%Y\') as date FROM posts ORDER BY post_id DESC';
         $result = $this->runReq($req, $posts);
         
         foreach($result as $post)
         {
             $posts[] = new Post($post);
         }
         return $posts;
     }

     // Lire un chapitre
     public function getOneChapter($postId)
     {
        $req = 'SELECT post_id as id, post_title as title, post_content as content, DATE_FORMAT(post_date, \'%d/%m/%Y\') as date FROM posts WHERE post_id=?';
        $result = $this->show($req, [$postId]);
        return new Post($result) ;  
     }


    // Ajouter un chapitre 
    public function addChapter($title, $content)
    {
        $req = 'INSERT INTO posts(post_title, post_content, post_date) VALUES (?, ?, NOW())';
        $result = $this->ina($req, [$title, $content]);
        return $result;
    }

    // Modifier un chapitre 
    public function modifyChapter($title, $content, $postId)
    {
        $req = 'UPDATE posts SET post_title = ?, post_content = ?, post_date = NOW() WHERE post_id = ?';
        $result = $this->ina($req, [$title, $content, $postId]);
        return $result;
    }

    // Supprimer un chapitre 
    public function removeEpisode($postId)
    {
        $req = 'DELETE FROM posts WHERE post_id = ?';
        $result = $this->ina($req, [$postId]);
        return $result;
    }

    /**
     * Compte la totalité des chapitres enregistrés dans la bdd
     */
    public function countChapters()
    {
        $nbChapterss='';
        $req = 'SELECT COUNT(*) AS nbChapters  FROM posts';
        $result = $this->runReq($req);
        if(!$result){
            return $nbChapters;
        }
        foreach($result as $value){
            $nbChapters = $value['nbChapters'];
        }
        // var_dump($nbChapters);
        // exit;
        return $nbChapters;
    }

    /**
     * Permet de définir le nombre de chapitres affichés par page
     */
    public function countPages($nbChapters, $perPage)
    {
        $nbPages = ceil($nbChapters / $perPage);
        return $nbPages;
    }

}