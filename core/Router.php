<?php

require_once ('Autoloader.php');
Autoloader::register();

class Router {

    private $request;

    public function routeReq()
    {
        try 
        {
            $this->request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($this->request);
            $action = $this->createAction($this->request);

            $controller->runAction($action);
        }
        catch (Exception $e)
        {

        }
    }

    private function createController($request)
    {
        $controller = "Home";
        if($request->isParam('controller'))
        {
            $controller = $request->getParam('controller');
            $controller = ucfirst(strtolower($controller));
        }
        try
        {
            $controllerClass = $controller."Controller";

            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;

        }
        catch(Exception $e)
        {
            throw new Exception("La page est introuvable.");
        }
    }

    private function createAction($request)
    {
        $action = "index";
        if($request->isParam('action'))
        {
            $action = $request-> getParam('action');
        }
        return $action;
    }


}