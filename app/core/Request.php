<?php
namespace App\Core;

class Request
{
  private $params;
  private $session;

  /**
   * Instancie les paramètres de la requête et l'objet Session
   */
  public function __construct(array $params)
  {
    $this->params = $params;
    $this->session = new Session();
  }

  /** 
  * Renvoie l'objet session associé à la requête 
  */
  public function getSession()
  {
    return $this->session;
  }

  /**
   * Renvoie un booléen si le paramètre existe dans la requête
   */
  public function paramExist(string $name)
  {
    return (isset($this->params[$name]) && $this->params[$name] != "");
  }

  /**
  * Renvoie la valeur du paramètre
  */
  public function getParam(string $name)
  {
    if ($this->paramExist($name)) {
      return $this->params[$name];
    } else {
        throw new \Exception("Paramètre '$name' introuvable!");
      }
  }

  /**
  * Renvoie les valeurs des paramètres par défaut
  */
  public function defaultParam($name, $default = null)
  {
    try
    {
      return $this->getParam($name);
    }
    catch(\Exception $e)
    {
      return $default;
    }
  }
}
