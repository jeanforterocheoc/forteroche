<?php

require_once ('Autoloader.php');
Autoloader::register();

class Route
{
    
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

        $regex = "#^$path$#i";
       

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
            // var_dump($params);
            
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