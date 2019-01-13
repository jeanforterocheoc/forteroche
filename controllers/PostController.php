<?php

class PostController extends Controller
{
    private $postManager;
    
    public function __construct() 
    {   
        
    }

    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment($postId)
    {
       
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $post = $this->postManager->getOne($postId);
        $comments = $this->commentManager->getComments($postId);
        
        $this->render('Post', array('postComment' => $post, 'comments' => $comments));
    }
}