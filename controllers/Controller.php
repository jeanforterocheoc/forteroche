<?php

require_once ('Autoloader.php');
Autoloader::register();

abstract class Controller 
{
    protected $request;
    private $action;

    public function setRequest($request)
    {
        $this->request = $request;
    }

    public function runAction($action)
    {
        if(method_exists($this, $action))
        {
            $this->action = $action;
            $this->{$this->action}($postId);
        }
        else 
        {
            $controllerClass = get_class($this);
            throw new Exception('Action '.$action.' non valide');
        }
    }


    // Méthode qui renvoie la vue demandée
     protected function render(string $name, array $params=[])
     {
        $view = new View($name);
        $view->generate($params);
     }

}