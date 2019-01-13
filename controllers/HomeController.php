<?php

class HomeController extends Controller 
{
    private $homeManager;

    public function __construct()
    {
        $this->firstPage();
    }

    public function firstPage()
    {
        $this->homeManager = new HomeManager;
        $homePost = $this->homeManager->homePost();

        $this->render('Home', array('firstPage' => $homePost));
    }


    // private $postManager;
    
    // public function __construct()
    // {
    //      $this->posts();
    // }
    
    // public function posts()
    // {
    //     $this->postManager = new PostManager;
    //     $posts = $this->postManager->getAll();
        
    //     $this->render('Home', array('posts' => $posts));     
    // }

    
}