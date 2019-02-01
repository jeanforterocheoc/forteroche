<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\PostsManager;
use App\Models\manager\CommentManager;
use App\Models\Messages;

class PostsController extends Controller
{
    private $postsManager;
    
    public function posts()
    {
        $this->postsManager = new PostsManager();
        $nbChapters = $this->postsManager->countChapters();
        $perPage = 1;
        $nbPages = $this->postsManager->countPages($nbChapters, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        // Défini le début dans le début dans l'élément LIMIT de la requête
        $start = ($currentPage-1)*$perPage; 
        $posts = $this->postsManager->getAll($start, $perPage);
        
        $this->render('Posts', array('posts' => $posts, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
    }

    

        

     
    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment()
    {
        $chapterId = $this->request->getParam("id");

        $this->postsManager = new PostsManager();
        $this->commentManager = new CommentManager();


        // Pagination posts
        $nbChapters = $this->postsManager->countChapters();
        $perPage = 1;
        $nbPages = $this->commentManager->countPages($nbChapters, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
         
        
        // Pagination comments
        $nbComments = $this->commentManager->countComments();
        $perPage = 2;
        $nbPages = $this->commentManager->countPages($nbComments, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        // Défini le début dans l'élément LIMIT de la requête
        $start = ($currentPage-1)*$perPage;

        $chapter = $this->postsManager->getOne($chapterId);
        $comments = $this->commentManager->getComments($chapterId, $start, $perPage);

        $this->render('Post', array('postComment' => $chapter, 'comments' => $comments, 'currentPage' => $currentPage, 'nbPages' => $nbPages));

    }

    // Permet d'ajouter un commentaire
    public function addComment()
    {
        if ($this->request->paramExist('author') && $this->request->paramExist('commentUser')) {
            $chapterId = htmlspecialchars($this->request->getParam('postId'), ENT_QUOTES) ;
            $author = htmlspecialchars($this->request->getParam('author'), ENT_QUOTES);
            $content = htmlspecialchars($this->request->getParam('commentUser'), ENT_QUOTES);

            $this->commentManager = new commentManager(); 
            $comment = $this->commentManager->addComment($chapterId,$author,$content);
            $this->redirection('Posts','postComment'.$chapterId);

            $this->messages = new Messages;
            $this->messages->setMsg('Le commentaire a été ajouté !', 'success');
        } 
        else {
            $this->redirection('Posts','postComment'.$this->request->getParam('postId'));

            $this->messages = new Messages;
            $this->messages->setMsg('Veuillez compléter tous les champs !', 'error');
        }   
    }

    // Signale un commentaire pour modération
    public function moderateComment()
    {
        $this->commentManager = new commentManager();

        $id = $this->request->getParam("id");

        $comment = $this->commentManager->getComment($id);
        $this->commentManager->reportComment($id);
    }
}
