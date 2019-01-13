<?php

class Router 
{
    private $url;
    private $routes = [];

    // Instanciation de l'url
    public function __construct($url)
    {
        $this->url = $url;
    }

    // Permet de stocker dans un tableau les url contenant la méthode GET
    public function get($path, $ctrl)
    {
        $route = new Route($path, $ctrl);
        $this->routes['GET'][] = $route;

    }

    // Permet de stocker dans un tableau les url contenant la méthode POST
    public function post($path, $ctrl)
    {
        $route = new Route($path, $ctrl);
        $this->routes['POST'][] = $route;

    }

    // Vérifie si une url correspond
    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if(!isset($this->routes[$method]))
        {
            throw new Exception('Aucune '. $method . ' ne correspond.');
        }
        foreach ($this->routes[$method] as $route) {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }
        throw new Exception('Aucune correspondance avec une route.');
    }
   
}