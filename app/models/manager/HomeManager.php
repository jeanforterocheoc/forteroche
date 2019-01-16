<?php
namespace App\Models\manager;
use App\Models\Database;
use App\Models\Post;

class HomeManager extends Database
{
    public function homePost($currentPage, $perPage)
    {
        $posts = [];
        $req = 'SELECT id, title, content, DATE_FORMAT (date, \'%d/%m/%Y \') AS date
                FROM chapter
                ORDER BY id
                DESC
                LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'';
        $result = $this->runReq($req, [$currentPage, $perPage]);

        foreach($result as $post)
        {
            $posts[] = new Post($post);
        }
        return $posts;
    }

    public function countHomePost()
    {
        $nbChapters='';
        $req = 'SELECT COUNT(*) AS nbChapters  FROM chapter';
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
