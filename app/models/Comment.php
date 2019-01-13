<?php
class Comment extends Model
{
    private $comment_id;
    private $post_id;
    private $comment_author;
    private $comment_title;
    private $comment_content;
    private $comment_date;

    // SETTERS
    public function setId($commentId)
    { 
        $commentId = (int) $commentId;

        if($commentId > 0)
        {
            $this->comment_id = $commentId;
        }
        
    }

    public function setPostId($postId)
    { 
        $postId = (int) $postId;

        if($postId > 0)
        {
            $this->post_id = $postId;
        }
        
    }

    public function setAuthor($author)
    {
        if(is_string($author))
        {
            $this->comment_author = $author;
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
        return $this->comment_id;   
    }

    public function postId()
    {
        return $this->post_id;
    }

    public function author()
    {
        return $this->comment_author;
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