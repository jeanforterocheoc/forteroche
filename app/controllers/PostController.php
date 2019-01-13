<?php

class PostController extends Controller
{
    private $postManager;
    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment()
    {
       $postId = $this->request->getParam("id");
       
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $post = $this->postManager->getOne($postId);
        $comments = $this->commentManager->getComments($postId);
        // $comment = $this->commentManager->addComment();
        $this->render('Post', array('postComment' => $post, 'comments' => $comments));
    }

}