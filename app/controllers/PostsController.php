<?php

class PostsController extends Controller
{
    private $postsManager;
    
    public function posts()
    {
        $this->postsManager = new PostsManager();
        $posts = $this->postsManager->getAll();
        
        $this->render('Posts', array('posts' => $posts));
              
    }

}