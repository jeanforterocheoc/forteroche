<?php

class HomeController extends Controller 
{
    private $homeManager;

    public function homepage()
    {
        // print_r($this->request);
        // var_dump($_SESSION);
        $this->homeManager = new HomeManager;
        $homePost = $this->homeManager->homePost();

        $this->render('Home', array('homePage' => $homePost));
    }
  
}