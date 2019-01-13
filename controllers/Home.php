<?php

require_once ('Autoloader.php');
Autoloader::register();

class HomeController extends Controller {

    private $postManager;
    
    public function __construct()
    {
         $this->posts();
    }
    
    
    public function posts()
    {
        $this->postManager = new PostManager;
        $posts = $this->postManager->getAll();
        
        $this->render('Home', array('posts' => $posts));
        // $this->generateView(array('posts' => $posts));
            
    }

    
}