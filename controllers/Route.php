<?php
require_once ('Autoloader.php');
Autoloader::register();
class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex)
    {
        $this->params[$param] = $regex;

        return $this;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        // var_dump($path);
        $regex = "#^$path$#i";
        // var_dump($regex);
        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }
        // var_dump($matches);
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call()
    {
        // return call_user_func_array($this->callable, $this->matches);
        if(is_string($this->callable))
        {
            $params = explode ('#', $this->callable);
            $controller = "controllers\\" .$params[0]. "Controller" .".php" ;
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $this->matches);


            // $action = $params[1];

            return $controller->action();
        }
        else{
            return call_user_func_array($this->callable, $this->matches);
        }
    }

}