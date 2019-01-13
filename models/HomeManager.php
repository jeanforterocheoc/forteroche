<?php
class HomeManager extends Database
{ 
public function homePost()
    {
        $posts = [];
        $req = 'SELECT post_id as id, post_title as title, post_content as content, DATE_FORMAT (post_date, \'%d/%m/%Y \') as date FROM posts ORDER BY post_id DESC LIMIT 0, 1';
        $result = $this->runReq($req, $posts);
        
        foreach($result as $post)
        {
            $posts[] = new Post($post);
        }
        return $posts;
    }
}