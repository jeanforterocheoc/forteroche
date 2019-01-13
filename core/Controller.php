<?php

require_once ('Autoloader.php');
Autoloader::register();

abstract class Controller 
{
  
    // Méthode qui renvoie la vue demandée
     protected function render(string $name, array $params=[])
     {
        $view = new View($name);
        $view->generate($params);
     }

}