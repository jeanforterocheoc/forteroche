<?php

class HomeController extends Controller 
{
    private $homeManager;

    // public function __construct()
    // {
    //     $this->homepage();
    // }

    public function homepageAction()
    {
        print_r($this->request);
        $this->homeManager = new HomeManager;
        $homePost = $this->homeManager->homePost();

        $this->render('Home', array('homePage' => $homePost));
    }
  
}