<?php
namespace App\Models;
use App\Models\Model;

class Comment extends Model
{
    private $id;
    private $chapter_id;
    private $author;
    private $title;
    private $content;
    private $date;
    private $report;

    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
        {
            $this->id = $id;
        }

    }

    public function setChapterId($chapter_id)
    {
        $chapter_id = (int) $chapter_id;

        if($chapter_id > 0)
        {
            $this->chapter_id = $chapter_id;
        }

    }

    public function setAuthor($author)
    {
        if(is_string($author))
        {
            $this->author = $author;
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

    public function setReport($commentReport)
    {
        $commentReport = (int) $commentReport;

        if($commentReport >= 0)
        {
            $this->report = $commentReport;
        }

    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getChapter_id()
    {
        return $this->chapter_id;
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
}
