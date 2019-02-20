<?php
namespace App\Models\Manager;

use App\Models\Manager\Manager;
use App\Models\Entity\Chapter;

class ChapterManager extends Manager
{
  /**
  * Récupère l'ensemble des chapitres
  */
  public function getAllChapters($start, $perPage)
  {
    $chapters = [];
    $req = 'SELECT id, title, content, DATE_FORMAT (date, \'%d/%m/%Y\') AS date
            FROM chapter
            ORDER BY id
            DESC
            LIMIT '.$start.','.$perPage.'
            ';    
    $result = $this->findAll($req, $chapters);
    if (!$result) {
      return $chapters;
    }
    foreach($result as $chapter)
    {
      $chapters[] = new Chapter($chapter);
    }
    return $chapters;
  }

  /**
  * Lire un chapitre
  */
  public function getOneChapter($chapterId)
  {
    $req = 'SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date
            FROM chapter
            WHERE id = ?
            ';
    $result = $this->findOne($req, [$chapterId]);
    return new Chapter($result) ;
  }

  /**
  * Ajouter un chapitre
  */
  public function addChapter($title, $content)
  {
    $req = 'INSERT INTO chapter(title, content, date) VALUES (?, ?, NOW())';
    $result = $this->runReq($req, [$title, $content]);
    if (!$result) {
      return null;
    }
    return $result;
  }

  /**
  * Modifier un chapitre
  */
  public function modifyChapter($title, $content, $chapterId)
  {
    $req = 'UPDATE chapter
            SET title = ?, content = ?, date = NOW()
            WHERE id = ?';
    $result = $this->runReq($req, [$title, $content, $chapterId]);
    if (!$result) {
      return null;
    }
    return $result;
  }

  /** 
  * Supprimer un chapitre
  */ 
  public function removeChapter($chapterId)
  {
    $req = 'DELETE FROM chapter WHERE id = ?';
    $result = $this->runReq($req, [$chapterId]);
    if (!$result) {
      return null;
    }
    return $result;
  }

  /**
  * Comptabilise les chapitres enregistrés dans la bdd
  */
  public function countChapters()
  {
    $nbChapters='';
    $req = 'SELECT COUNT(*) AS nbChapters  FROM chapter';
    $result = $this->findAll($req);
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
}
