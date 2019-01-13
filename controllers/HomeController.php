<?php

class HomeController extends Controller 
{
    private $homeManager;

    public function __construct()
    {
        $this->homePage();
    }

    public function homePage()
    {
        $this->homeManager = new HomeManager;
        $homePost = $this->homeManager->homePost();

        $this->render('Home', array('homePage' => $homePost));
    }
  
}