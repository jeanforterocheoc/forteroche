<?php

class AdminManager extends Database
{ 

     // Affiche l'ensemble des épisodes
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

     // Affiche un seul épisode 
     public function getOneChapter($postId)
     {
        $req = 'SELECT post_id as id, post_title as title, post_content as content, DATE_FORMAT(post_date, \'%d/%m/%Y\') as date FROM posts WHERE post_id=?';
        $result = $this->show($req, [$postId]);
        return new Post($result) ;  
     }


    // Ajoute un nouvel épisode dans la Bdd
    public function addChapter($title, $content)
    {
        $req = 'INSERT INTO posts(post_title, post_content, post_date) VALUES (?, ?, NOW())';
        $result = $this->ina($req, [$title, $content]);
        return $result;
    }

    // Modifie un épisode dans la Bdd
    public function changeEpisode($title, $content, $postId)
    {
        $req = 'UPDATE posts SET post_title = ?, post_content = ?, post_date = NOW() WHERE post_id = ?';
        $result = $this->ina($req, [$title, $content, $postId]);
        return $result;
    }

    // Supprime un épisode dans la Bdd
    public function removeEpisode($postId)
    {
        $req = 'DELETE FROM posts WHERE post_id = ?';
        $result = $this->ina($req, [$postId]);
        return $result;
    }

}