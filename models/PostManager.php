<?php
class PostManager extends Database
{
    // Retourne l'ensemble des billets
    public function getAll()
    {
        $posts = [];
        $req = 'SELECT post_id as id, post_title as title, post_content as content, post_date as date FROM posts ORDER BY post_id DESC';
        $result = $this->runReq($req, $posts);
        
        foreach($result as $post)
        {
            $posts[] = new Post($post);
        }
        // print_r($posts);
        return $posts;
    }

     // Retourne le contenu d'un billet
     public function getOne(int $postId)
     {
        $req = 'SELECT post_id as id, post_title as title, post_content as content, post_date as date FROM posts WHERE post_id=?';
        $post = $this->fetch($req, [$postId]);
        var_dump($post);
        return new Post($post) ;  
     }
}
