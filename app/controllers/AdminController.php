<?php

class AdminController extends Controller
{
    private $adminManager;

    // Affiche l'ensemble des épisodes /admin/allEpisode
    public function allEpisode()
    {
        $this->adminManager = new AdminManager();
        $episodeAll = $this->adminManager->getEpisodeAll();

        $this->render('allEpisode', array('posts' => $episodeAll));
    }

    // Affiche un seul épisode  /admin/oneEpisode/id
    public function oneEpisode()
    {
       $postId = $this->request->getParam("id");

        $this->adminManager = new AdminManager();
        $this->commentManager = new CommentManager();

        $one = $this->adminManager->getOneEpisode($postId);
        $comments = $this->commentManager->getComments($postId);

        $this->render('OneEpisode', array('oneEpisode' => $one, 'comments' => $comments));
    }

    // Créer un nouvel épisode /admin/newEpisode
    public function newEpisode()
    {
        $title = $this->request->defaultParam('title');
        $content = $this->request->defaultParam("content");

        if($title && $content)
        {
            $this->adminManager = new AdminManager();
            $this->adminManager->addEpisode($title, $content);
        }
        
        $this->render('NewEpisode', array('title' => $title, 'content' => $content));
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

    // Profil Admin
    public function homeAdmin()
    {
        // print_r($this->request);

        if(!empty($_POST['username']) AND !empty($_POST['password'])) {
            // print_r($_POST['username']);
            $username = $_POST['username'];
            $password = $_POST['password'];
            // var_dump($username, $password);
            
                $this->adminManager = new AdminManager;
                $user = $this->adminManager->getUser($username, $password);
                    
                $this->render('Admin', array('homeAdmin' => $user));
                  
        }else {
            echo ('Les identifiants sont incorrects.');
        }

        
        //     $user = $this->adminManager = new AdminManager;
        // if (isset($_POST['login'])){
        //     if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
        //         $this->adminManager->getUser(
        //                 $this->request->getParam("username"),
        //                 $this->request->getParam("password")
        //                 );
        //     }
        //     $this->render('Admin', array('homeAdmin' => $user));

        //     }
        
    }

}
