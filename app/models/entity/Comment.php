<?php
namespace App\Models\Entity;

use App\Models\Entity\Model;

class Comment extends Model
{
  private $id;
  private $author;
  private $content;
  private $date;
  private $report;
  private $chapter;

  // SETTERS
  public function setId_com($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->id = $id;
    }
  }

  public function setAuthor($author)
  {
    if (is_string($author)) {
      $this->author = $author;
    }
  }

  public function setContent_com($content)
  {
    if (is_string($content)) {
      $this->content = $content;
    }
  }

  public function setDate($date)
  {
    if (isset($date)) {
      $this->date = $date;
    }
  }

  public function setReport($commentReport)
  {
    $commentReport = (int) $commentReport;
    if ($commentReport >= 0) {
      $this->report = $commentReport;
    }
  }

  public function setChapter(Chapter $chapter) // Ajout de l'objet Chapter
  {
    $this->chapter = $chapter;
  }

  // GETTERS

  public function getId()
  {
    return $this->id;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getReport()
  {
    return $this->report;
  }

  public function getChapter()
  {
    return $this->chapter;
  }

}
