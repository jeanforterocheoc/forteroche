<?php
namespace App\Models\Entity;

use App\Models\Entity\Model;

class Chapter extends Model
{
  private $id;
  private $title;
  private $content;
  private $date;

  // SETTERS
  public function setId($chapterId)
  {
    $chapterId = (int) $chapterId;

    if ($chapterId > 0) 
    {
      $this->id = $chapterId;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title))
    {
      $this->title = $title;
    }
  }

  public function setContent($content)
  {
    if(is_string($content))
    {
      $this->content = $content;
    }
    }

  public function setDate($date)
  {
    $this->date = $date;
  }

  // GETTERS
  public function getId()
  {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getDate()
  {
    return $this->date;
  }
}
