<?php

require_once ('Autoloader.php');
Autoloader::register();

class PostController extends Controller
{
    private $postManager;
    
    public function __construct($postId) 
    {   
        $this->post($postId);
    }

    // Affichage de l'ensemble des commentaires associés à un billet
    public function post($postId)
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $post = $this->postManager->getOne($postId);
        $comments = $this->commentManager->getComments($postId);
        
        $this->render('Post', array('post' => $post, 'comments' => $comments));
    }
}