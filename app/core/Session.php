<?php
namespace App\Core;

class Session
{
  /**
  * Création d'une session
  */
  public function start()
  {
    session_start();
  }

  /**
  * Destruction d'une session
  */
  public function destroy()
  {
    session_start();
    session_destroy();
  }

  /**
  *  Ajout d'un attribut à la session
  */
  public function setAttribut($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
  *  Retourne un booléen de l'attribut
  */
  public function isAttribut($key)
  {
    return (isset($_SESSION[$key]) && $_SESSION[$key] !='');
  }

  /**
  *  Renvoie la valeur de l'attribut demandé
  */
  public function getAttribut($key)
  {
    if ($this->isAttribut($key)) {
      return $_SESSION[$key];
    } else {
        echo("L'attribut " . $key . " n'existe pas.");
      }  
    }
}
