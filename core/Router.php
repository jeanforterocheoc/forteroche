<?php

require_once ('Autoloader.php');
Autoloader::register();

// class Router 
// {
//     public $request;

//     public $routes = [];

//     public function __construct()
//     {
        
//     }

//     public function matchRoute($url)
//     {
//         foreach($this->routes as $route)
//         {
//             if($route->matchRequest($url))
//             {
//                 return $route;
//             }
//         }
//     }

//     public function run()
//     {

//     }
// }
    /////////////////////////////////////////////////////////////////////////////////////////
class Router 
{
    private $url;
    private $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if(!isset($this->routes[$method]))
        {
            throw new Exception('No Found'.$method);
        }
        foreach ($this->routes[$method] as $route) {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }
        throw new Exception('Aucune correspondance');
    }
   
}