<?php

require_once('Autoloader.php');
Autoloader::register();

class CommentController extends Controller
{
    private $commentManager;
    
    public function __construct($postId)
    {
        $this->comment($postId);
    }

    // Récupération de l'ensemble des commentaires associés à un billet
    public function comment($postId)
    {
        $this->commentManager = new CommentManager();
        $comments = $this->commentManager->getComments($postId);

        $this->render('Comment', array('comments' => $comments));
    }
}