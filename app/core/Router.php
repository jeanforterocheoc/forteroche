<?php
require_once ('../app/Autoloader.php');
Autoloader::register();

class Router 
{
   private $request; 
   private $uri;
   private $controller;
   private $action;
   private $postId;

   public function __construct()
   {
       $this->request = array_merge($_GET, $_POST);
   }
    public function run ()
    {
        try
        {
            $controller = $this->createController();
            $action = $this->getAction();
            $this->runAction($controller, $action);
        }
        catch(Exception $e)
        {
            throw new Exception ($e->getMessage());
        }   
    }

    private function createController()
    {
        if (!isset($this->request['controller']) || empty($this->request['controller'])) {
            throw new Exception('Page not found');
        }
        $controllerName = ucwords(strtolower($this->request['controller']));
        $controllerClass = $controllerName . 'Controller' ;
        $controllerFile =  '../app/controllers/'  . $controllerClass . '.php';

        if (!file_exists($controllerFile)) {
            throw new Exception('Page not found');
        }
        $controller = new $controllerClass($this->request);
        return $controller;
    }

    private function getAction($request)
    {
        if (!isset($this->request['action']) || empty($this->request['action'])) {
            throw new Exception('Page not found');
        }
        $action = $this->request['action'] . 'Action';
        return $action;
    }      
          
    private function runAction($controller, $action)
    {
        if (!method_exists($controller, $action))
        {
            throw new Exception('Page not found');
        }
        $controller->$action();
    }
    
    private function manageError($exception)
    {

    } 
}