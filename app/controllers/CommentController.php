<?php

class CommentController 
{
  
    
    public function addComment($postId, $author, $content)
    {
        $this->commentManager = new commentManager();

        $comment = $this->commentManager->addComment($postId, $author, $content);

        return $comment;

    }

}