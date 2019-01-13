<?php

class Router 
{
    /**
     * Gère la requête du visiteur,en aiguillant vers le bon contrôleur
     * et appelle l'action associée au contrôleur
     */
    public function run ()
    {
        try
        {
            
            // Création d'un objet Request afin de récupérer les paramètres
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

    /**
     * Création du contrôleur en fonction de la requête
     */
    private function createController($request)
    {
        
        if ($request->paramExist('controller'))
        {
            $controller = $request->getParam('controller');
            $controller = ucfirst(strtolower($controller));
        }

        // Création du nom du fichier du contrôleur
        $controllerClass = $controller . 'Controller' ;
        $controllerFile =  '../app/controllers/'  . $controllerClass . '.php';

        if (!file_exists($controllerFile)) {
                throw new Exception("File '$controllerFile' not found");
            }
            $controller = new $controllerClass();
            $controller->setRequest($request);
            
            return $controller;
    }

    /**
     * Renvoie l'action associée au contrôleur
     */
    private function createAction($request)
    {
        
        if($request->paramExist('action'))
        {
            $action = $request->getParam('action');
        }
        return $action;
    }      
}