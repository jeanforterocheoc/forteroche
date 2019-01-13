<?php

require_once ('Autoloader.php');
Autoloader::register();

class Route
{
    // private $url;
    // private $controller;
    // private $action;


    // public function setUrl($url)
    // {
    //     $this->url = $url;
    // }

    // public function setController($controller)
    // {
    //     $this->controller = $controller;
    // }

    // public function setAction($action)
    // {
    //     $this->action = $action;
    // }

    // public function getController()
    // {
    //     $controllerName = '\\controllers\\' .$this->controller. '\\Controller';

    //     return new $controllerName();
    // }

    // public function getAction()
    // {
    //     return $this->action;
    // }

    // public function matchRequest($url)
    // {
    //     return preg_match($this->url, $url);
    // }

/////////////////////////////////////////////////////////////////////////////////////////////

    private $path;
    private $callable;
    private $matches;

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

        $regex = "#^$path#i";
       

        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call()
    {
        if (is_string($this->callable)) {
            $params = explode('#', $this->callable);
            var_dump($params);
            
            // $controller = "controllers\\".$params[0]."Controller".".php";
            $controller = ucwords($params[0])."Controller";

            // var_dump($controller);

            // var_dump($params[1]);
            
            $controller = new $controller();

            // $action = $params[1];
            // return $controller->$action();

            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }
       
}