<?php

namespace App\Core;
use App\Core\View;

 abstract class Controller
{
  private $action;
  protected $request;

  /**
  * Instancie la requête 
  */
  public function __construct($request)
  {
      $this->setRequest($request);
  }

  /**
  * Détermine la rêquete de l'utilisateur 
  */
  public function setRequest($request)
  {
    $this->request = $request;
  }

  /**
  * Exécute l'action selon la requête 
  */
  public function runAction(string $action)
  {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->$action();
    } else {
      $this->redirection('errors','error404');
    }
  }

  /**
   * Création de la vue demandée selon le controller et l'action
   */
  protected function render(string $action, array $params=[])
  {
    $controllerClass = get_class($this);
    $controller = str_replace("App\\Controllers\\", "", $controllerClass);
    $view = new View($action, $controller);
    $view->generate($params);
  }

  /**
  * Redirige vers le controller désiré et l'action demandée
  */
  protected function redirection(string $controller, string $action = null)
  {
    $racineWeb = Config::get("racineWeb", "/");
    header("location:".$racineWeb .$controller.'/'.$action);
  }
}
