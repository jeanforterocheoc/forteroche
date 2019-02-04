<?php
namespace App\Models\Manager;

use App\Models\Entity\Database;
use App\Models\Entity\Comment;
use App\Models\Entity\Chapter;

class CommentManager extends Database
{
  /**
  * Renvoie tous les commentaires
  */
  public function commentsAll($currentPage, $perPage)
  {
    $comments = [];
    $req = 'SELECT *
            FROM comment
            INNER JOIN chapter
            ON comment.chapter_id = chapter.id
            ORDER BY chapter_id
            LIMIT '.(($currentPage - 1) * $perPage).','.$perPage.'
            ';
    $results = $this->findAll($req,[$currentPage, $perPage]);
    if (!$results) {
      return $comments;
    }
    foreach($results as $result)
    {
      $comment = new Comment($result);
      $comment->setChapter(new Chapter($result));
      $comments[] = $comment;
    }          
    return $comments;
  }

  /**
  * Compte la totalité des commentaires enregistrés dans la bdd
  */
  public function countComments()
  {
    $nbComments='';
    $req = 'SELECT COUNT(*) AS nbComments  FROM comment';
    $result = $this->findAll($req);
    if (!$result) {
      return $nbComments;
    }
    foreach($result as $value){
      $nbComments = $value['nbComments'];
    }
    return $nbComments;
  }

  /**
  * Additionne les signalements enregistrés dans la bdd
  */
  public function countReport()
  {
    $nbReport='';
    $req = 'SELECT SUM(report) AS nbReport  FROM comment';
    $result = $this->findAll($req);
    if(!$result){
      return $nbReport;
    }
    foreach($result as $value)
    {
      $nbReport = $value['nbReport'];
    }
    return $nbReport;
  }

  /**
  * Permet de définir le nombre de commentaires affichés par page
  */
  public function countPages($nbComments, $perPage)
  {
    $nbPages = ceil($nbComments / $perPage);
    return $nbPages;
  }

  /**
  * Renvoie l'ensemble des commentaires associés à un chapitre
  */
  public function getComments($chapterId, $start, $perPage)
  {
    $comments = [];
    $req = 'SELECT id_com, author, content_com, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date
            FROM comment
            WHERE chapter_id = ?
            GROUP BY id_com
            DESC
            LIMIT '.$start.','.$perPage.'
            ';
                
    $result = $this->findAll($req, [$chapterId]);
    if(!$result){
      return $comments;
    }
    foreach($result as $comment)
    {
      $comments[] = new Comment($comment);
    }
    return $comments;
  }

  /**
  * Retourne un commentaire 
  */
  public function getComment($id)
  {
    $req = 'SELECT id_com, author, content_com, DATE_FORMAT(date_com, \'%d/%m/%Y\') as date, report
            FROM comment
            WHERE id_com = ?
            ';
    $comment = $this->findOne($req, [$id]);
    return new Comment($comment);
  }
  
  /**
  * Enregistre un commentaire  
  */
  public function addComment($chapterId, $author, $content)
  {
    $req = 'INSERT INTO comment(chapter_id, author, content_com, date_com)
            VALUES (?, ?, ?,NOW())
            ';
    $result = $this->runReq($req, [$chapterId, $author, $content]);
    return $result;
  }

  /**
  * Ajoute un signalement pour modération éventuelle 
  */ 
  public function reportComment($commentId)
  {
    $req = 'UPDATE comment SET report = report + 1 WHERE id_com = ?';
    $result = $this->runReq($req, [$commentId]);
    return $result;
  }

  /**
  * Validation d'un commentaire 
  */ 
  public function validateComment($commentId)
  {
    $req = 'UPDATE comment SET report = 0 WHERE id_com = ?';
    $result = $this->runReq($req, [$commentId]);
    return $result;
  }

  /**
  * Suppression d'un commentaire  
  */  
  public function deleteComment($commentId)
  {
    $req = 'DELETE FROM comment WHERE id_com = ?';
    $result = $this->runReq($req, [$commentId]);
    return $result;
  }
}
