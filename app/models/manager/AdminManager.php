<?php

class AdminManager extends Database
{ 

     // Retourne l'ensemble des épisodes
     public function getEpisodeAll()
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


    // Ajoute un épisode dans la Bdd
    public function addEpisode($title, $content)
    {
        $req = 'INSERT INTO posts(post_title, post_content, post_date) VALUES (?, ?, NOW())';
        $result = $this->ina($req, [$title, $content]);
        return $result;
    }

    // Modifie un épisode dans la Bdd
    public function changeEpisode()
    {

    }

}