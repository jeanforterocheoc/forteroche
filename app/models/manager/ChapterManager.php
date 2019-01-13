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
         $req = 'SELECT chapter_id as id, title as title, content as content, DATE_FORMAT (date, \'%d/%m/%Y\') as date
                FROM chapters 
                ORDER BY chapter_id 
                DESC';

         $result = $this->runReq($req, $posts);
         
         foreach($result as $post)
         {
             $posts[] = new Post($post);
         }
         return $posts;
     }

     // Lire un chapitre
     public function getOneChapter($chapterId)
     {
        $req = 'SELECT chapter_id as id, title as title, content as content, DATE_FORMAT(date, \'%d/%m/%Y\') as date
                FROM chapters 
                WHERE chapter_id=?';

        $result = $this->show($req, [$chapterId]);
        return new Post($result) ;  
     }


    // Ajouter un chapitre 
    public function addChapter($title, $content)
    {
        $req = 'INSERT INTO chapters(title, content, date) VALUES (?, ?, NOW())';
        $result = $this->ina($req, [$title, $content]);
        return $result;
    }

    // Modifier un chapitre 
    public function modifyChapter($title, $content, $chapterId)
    {
        $req = 'UPDATE chapters 
        SET title = ?, content = ?, date = NOW() 
        WHERE chapter_id = ?';
        $result = $this->ina($req, [$title, $content, $chapterId]);
        return $result;
    }

    // Supprimer un chapitre 
    public function removeEpisode($chapterId)
    {
        $req = 'DELETE FROM chapters WHERE chapter_id = ?';
        $result = $this->ina($req, [$chapterId]);
        return $result;
    }

    /**
     * Compte la totalité des chapitres enregistrés dans la bdd
     */
    
    public function countChapters()
    {
        $nbChapterss='';
        $req = 'SELECT COUNT(*) AS nbChapters  FROM chapters';
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