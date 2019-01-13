<?php

abstract class Controller 
{
  protected $request;

  public function __construct($request)
  {
    $this->request = $request;
  }
    // Méthode qui renvoie la vue demandée
     protected function render(string $name, array $params=[])
     {
        $view = new View($name);
        $view->generate($params);
     }

}