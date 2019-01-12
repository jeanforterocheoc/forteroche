<?php
class Comment
{
    private $comment_id;
    private $post_id;
    private $comment_author;
    private $comment_title;
    private $comment_content;
    private $comment_date;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setId($postId)
    {
        $postId = (int) $postId;

        if($postId > 0)
        {
            $this->comment_id = $postId;
        } 
    }

    public function setAuthor($author)
    {
        if(is_string($author))
        {
            $this->comment_author = $author;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->comment_title = $title;
        }
    }

    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->comment_content = $content;
        }
    }

    public function setDate($date)
    { 
        $this->comment_date = $date; 
    }

    // GETTERS

    public function id()
    {
        return $this->post_id;
        
    }

    public function author()
    {
        return $this->comment_author;
    }

    public function title()
    {
        return $this->comment_title;
    }

    public function content()
    {
        return $this->comment_content;
    }

    public function date()
    {
        return $this->comment_date;
    }
}