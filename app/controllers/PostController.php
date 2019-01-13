<?php

class PostController extends Controller
{

    // Affichage de l'ensemble des commentaires associés à un billet
    public function postCommentAction($postId)
    {
       
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $post = $this->postManager->getOne($postId);
        $comments = $this->commentManager->getComments($postId);
        // $comment = $this->commentManager->addComment();
        $this->render('Post', array('postCommentAction' => $post, 'comments' => $comments));
    }

}