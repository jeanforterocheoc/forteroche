<?php
namespace App\Models\manager;
use App\Models\Database;
use App\Models\Post;

class PostManager extends Database
{
    // Retourne le contenu d'un billet
    public function getOne(int $chapterId)
    {
        $req = 'SELECT chapter_id as id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') as date
        FROM chapters 
        WHERE chapter_id = ?';
        $post = $this->show($req, [$chapterId]);
        return new Post($post) ;  
    }
}
