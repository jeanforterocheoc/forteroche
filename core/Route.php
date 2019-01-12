<?php
require_once ('Autoloader.php');
Autoloader::register();

class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $paramMatch = [];
   

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    // public function with($param, $regex)
    // {
    //     $this->params[$param] = $regex;
    //     return $this;
    // }   


    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        // $regex = '#^'.$path.'$#i';
        // $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);

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
        // print_r($this->matches);

    //     var_dump($this->matches);
    //     $controller = '';
    //     if (isset($this->callable['controller']) && !empty($this->callable['controller'])) {
    //         $controller = $this->callable['controller'];
    //     }

    //     $action = 'index';
    //     if (isset($this->callable['action']) && !empty($this->callable['action'])) {
    //         $action = $this->callable['action'];
    //     }

    //     $controller = $controller.'Controller';
    //     $controller = ucwords($controller);
    //     $controller = "controllers/".$controller.".php";

    //     $app = new $controller();
    //     return call_user_func_array([$app, $action], $this->matches);
    // }
    
        if(is_string($this->callable))
        {
            $params = explode('#', $this->callable);
            var_dump($params);
            $controller = $params[0]."Controller".".php";

            var_dump($controller);
            var_dump($params[1]);
            $controller = new $controller();
            $action = $params[1];
            
        return call_user_func_array([$controller, $params[1]], $this->matches);

            
            return $controller->$action();
        }
        else {
        return call_user_func_array($this->callable, $this->matches);

        }
    }

    private function paramMatch($match)
    {
        if(isset($this->params[$match[1]]))
        {
            return '('.$this->params[$match[1]].')';
        }
        return '([^/]+)';
        //var_dump($match);
    }
}
