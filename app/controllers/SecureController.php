<?php
/**
 * Cette classe permet de sécuriser la connection
 * Si les données du user ne sont pas en session,il est
 * redirigé sur la page de connexion
 */
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Entity\User;

abstract class SecureController extends Controller
{
  protected $user;
  /**
  * Fait appel au contructeur parent et instancie la classe User
  * Decode les données reçues au format json 
  */
  public function __construct($request)
  {
    parent::__construct($request);
    if (!$this->request->getSession()->isAttribut('user')) {
      $this->redirection('auth', 'login');
    }
    $this->user = new User(json_decode($this->request->getSession()->getAttribut('user'), true));  
  }
}
