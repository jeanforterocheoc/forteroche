<?php
namespace App\Core;

class Router 
{
  /**
  * Réceptionne la requête 
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
  * Création du contrôleur selon la requête
  */
  private function createController($request)
  {
    if ($request->paramExist('controller')) {
      $controller = $request->getParam('controller');
      $controller = ucfirst(strtolower($controller));
    }

    // Création du nom du fichier du contrôleur
    $controllerClass = $controller . 'Controller' ;
    $ctrl = 'App\\Controllers\\'. $controllerClass;

    if (!class_exists($ctrl)) {
      $this->errorRedirection('errors','error404');
    }    
    $controller = new $ctrl($request);
        
    return $controller;
  }

  /**
  * Renvoie l'action associée au contrôleur
  */
  private function createAction($request)
  {
    if ($request->paramExist('action')) {
      $action = $request->getParam('action');
    } 

    if (!$request->paramExist('action')) {
      $this->errorRedirection('errors','error404');
    }
    return $action;
  } 
  
  /**
  * Redirige vers le controller désiré
  */
  protected function errorRedirection(string $controller, string $action = null)
  {
    $racineWeb = Config::get("racineWeb", "/");
    header("location:".$racineWeb .$controller.'/'.$action);
  }
  
}