<?php

class AdminController extends Controller
{
    private $adminManager;
    private $commentManager;
   
    

    /** CHAPITRES */    

    // Affiche l'ensemble des chapitres /admin/allChapters
    public function allChapters()
    {
        $this->adminManager = new AdminManager();
        $allChapters = $this->adminManager->getAllChapters();

        $this->render('allChapters', array('posts' => $allChapters));
    }

    // Affiche un seul épisode  /admin/oneChapter/id
    public function oneChapter()
    {
       $postId = $this->request->getParam("id");

        $this->adminManager = new AdminManager();
        $this->commentManager = new CommentManager();

        $one = $this->adminManager->getOneChapter($postId);
        $comments = $this->commentManager->getComments($postId);

        $this->render('OneChapter', array('oneChapter' => $one, 'comments' => $comments));
    }

    // Créer un nouvel épisode /admin/newChapter
    public function newChapter()
    {
        $title = $this->request->defaultParam('title');
        $content = $this->request->defaultParam("content");
        
        if($title && $content)
        {
            $this->adminManager = new AdminManager();
            $this->adminManager->addChapter( $title, $content);
        }
        
        $this->render('newChapter', array('title' => $title, 'content' => $content));
    } 

    // Modifie un épisode  /admin/modifEpisode/id
    public function modifEpisode()
    {

        $postId = $this->request->getParam("id");
        $this->adminManager = new AdminManager();
        $post = $this->adminManager->getOneEpisode($postId);
        
        if($this->request->paramExist('title') && $this->request->paramExist('content'))
        {
            $this->adminManager->changeEpisode(
                 $this->request->getParam("title"),
                 $this->request->getParam("content"),
                 $postId
            );
        }
       $this->render('ModifEpisode', array('modifEpisode' => $post));
    }

    // Supprime un épisode  /admin/deleteEpisode/id
    public function deleteEpisode()
    {
        $postId = $this->request->getParam("id");

        $this->adminManager = new AdminManager();
        $post = $this->adminManager->getOneEpisode($postId);

        if(isset($_POST['supprimer'])) {
            $this->adminManager->removeEpisode($postId);
        }  
        
       $this->render('DeleteEpisode', array('deleteEpisode' => $post));

    }

    /** COMMENTAIRES */

    // Affiche l'ensemble des commentaires /admin/allComments
    public function allComments()
    {
        $this->commentManager = new CommentManager();
        $nbComments = $this->commentManager->countComments();
        $perPage = 5;
        $nbPages = $this->commentManager->countPages($nbComments, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        $comments = $this->commentManager->commentsAll($currentPage, $perPage);
        
       $this->render('AllComments', array('allComments' => $comments, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
    }

    // Validation d'un commentaire par l'admin /admin/validate/commentId
    public function validate()
    {
        $this->commentManager = new CommentManager();
        $commentId = $this->request->getParam("id");
        $this->commentManager->validateComment($commentId);
        $this->redirection('admin', 'allComments');
    }

    // Suppression d'un commentaire par l'admin /admin/validate/commentId
    public function delete()
    {
        $this->commentManager = new CommentManager();
        $commentId = $this->request->getParam("id");
        $this->commentManager->deleteComment($commentId);
        $this->redirection('admin', 'allComments');
    }
    

    /** PROFIL */

    // // Profil Admin  admin/homeAdmin
    public function homeAdmin()
    {     
        $this->render('Admin');           
    }
}
