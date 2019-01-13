<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Post;

class PostsManager extends Database
{
    // Retourne l'ensemble des billets
    public function getAll()
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
}