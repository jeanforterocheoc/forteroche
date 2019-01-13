<?php
class PostManager extends Database
{
   
    // Retourne le contenu d'un billet
    public function getOne(int $postId)
    {
        $req = 'SELECT post_id as id, post_title as title, post_content as content, DATE_FORMAT(post_date, \'%d/%m/%Y\') as date FROM posts WHERE post_id=?';
        $post = $this->show($req, [$postId]);
        return new Post($post) ;  
    }
}
