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
  protected function render(string $name, array $params=[])
  {
    $view = new View($name); 
    $view->generate($params);
  }
}