<?php
require_once ('../app/Autoloader.php');
Autoloader::register();

class Router 
{
   
    public function run ()
    {
        try
        {
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->runAction($action);
        }
        catch(Exception $e)
        {
            throw new Exception ($e->getMessage());
        }   
    }

    private function createController($request)
    {
        $controller = 'Home';
        if ($request->paramExist('controller'))
        {
            $controller = $request->getParam('controller');
            $controller = ucfirst(strtolower($controller));
        }
        // $controllerName = ucwords(strtolower($this->request['controller']));
        $controllerClass = $controller . 'Controller' ;
        $controllerFile =  '../app/controllers/'  . $controllerClass . '.php';

        if (!file_exists($controllerFile)) {
                throw new Exception('Page not found');
            }
            // $controller = new $controllerClass($request);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            
            return $controller;



        // if (!isset($this->request['controller']) || empty($this->request['controller'])) {
        //     throw new Exception('Page not found');
        // }
        // $controllerName = ucwords(strtolower($this->request['controller']));
        // $controllerClass = $controllerName . 'Controller' ;
        // $controllerFile =  '../app/controllers/'  . $controllerClass . '.php';

        // if (!file_exists($controllerFile)) {
        //     throw new Exception('Page not found');
        // }
        // $controller = new $controllerClass($this->request);
        // return $controller;
    }

    private function createAction($request)
    {
        $action = 'index';
        if($request->paramExist('action'))
        {
            $action = $request->getParam('action');
        }
        return $action;
        // if (!isset($this->request['action']) || empty($this->request['action'])) {
        //     throw new Exception('Page not found');
        // }
        // $action = $this->request['action'] . 'Action';
        // return $action;
    }      
          
    // private function runAction($controller, $action)
    // {
    //     if (!method_exists($controller, $action))
    //     {
    //         throw new Exception('Page not found');
    //     }
    //     $controller->$action();
    // }
    
    private function manageError($exception)
    {

    } 
}