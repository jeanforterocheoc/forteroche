<?php

class Route
{
    
    // private $path;
    // private $ctrl;
    // private $matches = [];
    // private $params = [];

    // public function __construct($path, $ctrl)
    // {
    //     $this->path = trim($path, '/');
    //     $this->ctrl = $ctrl;
    // }


    // // Indique si une route match ou non
    // public function match($url)
    // {
    //     $url = trim($url, '/');
    //     $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

    //     $regex = "#^$path$#i";
       

    //     if(!preg_match($regex, $url, $matches))
    //     {
    //         return false;
    //     }

    //     array_shift($matches);
    //     $this->matches = $matches;
    //     return true;
    // }

    // // Renvoie le controller appelé si une url correspond
    // public function call()
    // {
    //     if (is_string($this->ctrl)) {
    //         $params = explode('#', $this->ctrl);
            
    //         $controller = ucwords($params[0])."Controller";

    //         $controller = new $controller();
            
    //         return call_user_func_array([$controller, $params[1]], $this->matches);

    //     } else {
    //         return call_user_func_array($this->ctrl, $this->matches);
    //     }
    // }
       
}