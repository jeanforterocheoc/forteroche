<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\PostManager;
use App\Models\manager\PostsManager;
use App\Models\manager\CommentManager;

class PostController extends Controller
{
    private $postManager;
    private $commentManager;
    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment()
    {
        
       $chapterId = $this->request->getParam("id");
       
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

        $chapter = $this->postManager->getOne($chapterId);
        $comments = $this->commentManager->getComments($chapterId);

        $this->render('Post', array('postComment' => $chapter, 'comments' => $comments));
    }

    // Permet d'ajouter un commentaire 
    public function addComment()
    {
        // print_r($this->request);
        // die();
        $this->commentManager = new commentManager();
        
        $chapterId = $this->request->getParam("postId");
        $author = $this->request->getParam("author");
        $content = $this->request->getParam("content");
        
        $comment = $this->commentManager->addComment($chapterId, $author, $content);

        $this->redirection('posts', 'posts'); 

    }

    // Signale un commentaire pour modération
    public function moderateComment()
    {
        // echo 'J\'apparais dans la fenêtre modale!';
     
        $this->commentManager = new commentManager();

        $id = $this->request->getParam("id");
        
        $comment = $this->commentManager->getComment($id);
        $this->commentManager->reportComment($id);
        
    }  
}