<?php

require_once ('Autoloader.php');
Autoloader::register();

class Router {

    private $routes = [];
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path,  $callable)
    {
        $route =new Route($path, $callable);
        $this->routes['GET'][] = $route;

        // return $route;

        // $this->routes['GET'][] = new Route($path, $callable);
    }

    public function post($path,  $callable)
    {
        $route =new Route($path, $callable);
        $this->routes['POST'][] = $route;

        // return $route;

        // $this->routes['POST'][] = new Route($path, $callable);
    }

    public function run()
    {
        // print_r($this->routes);
        // exit();

        $method = $_SERVER['REQUEST_METHOD'];
        if(!isset($this->routes[$method]))
        {
            throw new Exception('No Found '.$method);
        }
        foreach ($this->routes[$method] as $route) {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }
        throw new Exception('Aucune correspondance');
    }
  
    
    //         $this->error($e->getMessage());
    
    // private $ctrl;
    // private $view;

    // public function routeReq()
    // {
    //     $url = '';

    //     if(isset($_GET['url'])) {
    //         $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
    //         var_dump($url);
    //         $controller = ucfirst(strtolower($url[0]));
    //         $controllerClass = $controller."Controller";
    //         $controllerFile = "controllers/".$controllerClass.".php";

    //         if(file_exists($controllerFile)) {
    //             // require_once($controllerFile);
    //             $this->ctrl = new $controllerClass($url);
    //         }
    //     }
    // }
    

    // private function error($msgError)
    // {
    //     $view = new View("Error");
    //     $view->generate(array('msgError' => $msgError));
    // } 
}