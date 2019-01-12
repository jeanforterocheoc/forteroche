<?php

require_once ('Autoloader.php');
Autoloader::register();

class Router {

    private $url;
    private $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route =new Route($path, $callable);
        $this->routes['GET'][] = $route;

        return $route;
    }

    public function post($path, $callable)
    {
        $route =new Route($path, $callable);
        $this->routes['POST'][] = $route;

        return $route;
    }

    public function run()
    {
        // echo '<pre>';
        // echo print_r($this->routes);
        // echo '</pre>';
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            throw new Exception('aucune requête serveur ne correspond');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->url))
            {
               return $route->call();
            }
        }
        throw new Exception('aucune route ne correspond');
    }








    // public function routeReq() 
    // {
    //     try
    //     {
    //         $url = [''];

    //         if (isset($_GET['action'])) 
    //         {
    //             if ($_GET['action'] == 'post') 
    //             {
    //                 if (isset($_GET['id'])) 
    //                 {
    //                     $postId = intval($_GET['id']);
    //                 }    
    //                     if ($postId != 0) 
    //                     {    
    //                         $this->ctrl = new postController($postId);        
    //                     }
    //                     else
    //                     {
    //                         throw new Exception("Identifiant de l'épisode non valide");
    //                     }  
    //                 }
    //                 else
    //                 {
    //                     throw new Exception("Action non valide");
    //                 }
    //             }
    //         else
    //         { 
    //             $this->ctrl = new homeController($url);  
    //         }
    //     }
    //     catch(Exception $e){
    //         $this->error($e->getMessage());
    //     }
    // }

    // private function error($msgError)
    // {
    //     $view = new View("Error");
    //     $view->generate(array('msgError' => $msgError));
    // } 
}