<?php

// require_once ('Autoloader.php');
// Autoloader::register();

class Router {

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
       $url = $this->parseUrl();

       if(file_exists('../controllers/' . $url[0] . '.php'))
       {
           $this->controller = $url[0];
           unset($url[0]);
       }
       require_once 'controllers/' . $this->controller . '.php';
       $this->controller = $this->controller;
       
       if(isset($url[1]))
       {
           if(method_exists($this->controller, $url[1]))
           {
               $this->method = $url[1];
               unset($url[1]);
           }
       }

    }

    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    

    
}