<?php

class PostController extends Controller
{
    private $postManager;
    private $commentManager;
    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment()
    {
        
       $postId = $this->request->getParam("id");
       
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $post = $this->postManager->getOne($postId);
        $comments = $this->commentManager->getComments($postId);

        $this->render('Post', array('postComment' => $post, 'comments' => $comments));
    }

    // Permet d'ajouter un commentaire
    public function addComment()
    {
        // print_r($this->request);
        // die();
        $this->commentManager = new commentManager();
        
        $postId = $this->request->getParam("postId");
        $author = $this->request->getParam("author");
        $content = $this->request->getParam("content");
        
        $comment = $this->commentManager->addComment($postId, $author, $content);

    }

    // Signale un commentaire pour modération
    public function moderateComment()
    {
        $this->commentManager = new commentManager();

        $id = $this->request->getParam("id");
        $comment = $this->commentManager->getComment($id);
        // var_dump($comment);
        if($this->request->paramExist('comment_report')) {
            $this->commentManager->reportComment($id);
            echo "Signalement envoyé!";
        }
            
        $this->render('Moderate', array('moderateComment' => $comment));  
    }
}