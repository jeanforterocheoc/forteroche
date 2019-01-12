<?php
class Post
{
    private $post_id;
    private $post_title;
    private $post_content;
    private $post_date;

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
            $this->post_id = $postId;
        }
        
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->post_title = $title;
        }
    }

    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->post_content = $content;
        }
    }

    public function setDate($date)
    { 
        $this->post_date = $date; 
    }

    // GETTERS

    public function id()
    {
        return $this->post_id;
        // var_dump($this->post_id);
    }

    public function title()
    {
        return $this->post_title;
    }

    public function content()
    {
        return $this->post_content;
    }

    public function date()
    {
        return $this->post_date;
    }
}

