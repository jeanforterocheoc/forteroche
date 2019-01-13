<?php

abstract class Controller 
{
  private $action;
  protected $request;
  

  public function setRequest($request)
  {
    $this->request = $request;
  }

  public function runAction($action)
  {
    if (method_exists($this, $action))
    {
      $this->action = $action;
      $this->$action();
    } 
    else {
      $controllerClass = get_class($this);
      throw new \Exception("Action '$action' non définie!");
    }
  }

  // Méthode qui renvoie la vue demandée
  protected function render(string $action, array $params=[])
  {
    $controllerClass = get_class($this);
    // var_dump($controllerClass);

    $controller = str_replace("../blog_forteroche/Controller/", "", $controllerClass);
    
    $view = new View($action); 
    $view->generate($params);
  }

  protected function redirection($controller, $action = null)
  {
    $racineWeb = Config::get("racineWeb", "/");
    header("location:".$racineWeb .$controller.'/'.$action);
  }
}