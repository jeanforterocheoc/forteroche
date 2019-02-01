<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Post;

class PostsManager extends Database
{
    // Retourne l'ensemble des chapitres
    public function getAll($start, $perPage)
    {
        $chapters = [];
        $req = 'SELECT id AS id, title AS title, content AS content, DATE_FORMAT (date, \'%d/%m/%Y\') AS date
                FROM chapter
                ORDER BY id
                DESC
                LIMIT '.$start.','.$perPage.'
                ';

        $result = $this->recoverAll($req, $chapters);

        foreach($result as $chapter)
        {
            $chapters[] = new Post($chapter);
        }
        return $chapters;
    }

     // Recupère un chapitre
     public function getOne(int $chapterId)
     {
         
         $req = 'SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date
                 FROM chapter
                 WHERE id = ? 
                 ';
                 
         $post = $this->recoverOne($req, [$chapterId]);
         
         return new Post($post) ;
     }

    /**
     * Compte les chapitres enregistrés dans la bdd
     */
    public function countChapters()
    {
        $nbChapters='';
        $req = 'SELECT COUNT(*) AS nbChapters  FROM chapter';
        $result = $this->recoverAll($req);
        if(!$result){
            return $nbChapters;
        }
        foreach($result as $value){
            $nbChapters = $value['nbChapters'];
        }
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

    public function countPag($nbPost, $perPage)
    {
        $nbPages = ceil($nbPost / $perPage);
        return $nbPages;
    }
}
