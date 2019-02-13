<?php
/**
 * La classe AuthController permet de vérifier l'identité de l'utilisateur
 * et de mettre l'objet user en session si toutes les garanties sont réunies
 */
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Manager\UserManager;
use App\Services\Messages;

class AuthController extends Controller
{
  private $userManager;
  /**
  * Après une vérification de l'existence des identifiants dans la bdd
  * Ajout à la session des données dans un tableau au format json 
  */
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->render('Auth');
      return;
    }
    if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
      $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
      $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);

      $userManager = new UserManager;
      $user = $userManager->checkUser($username);
      if (null != $user) {
        if (password_verify($password, $user->getPassword())) {
          $this->request->getSession()->setAttribut('user', json_encode($user->toArray()));
          $this->redirection('user', 'homepageUserAdmin');
        } else {
            $messages = new Messages;
            $messages->setMsg('Erreur d\'identifiants !', 'error');
          }
      } else {
          $messages = new Messages;
          $messages->setMsg('Les identifiants sont incorrects !', 'error');
        }
    } else {
            $messages = new Messages;
            $messages->setMsg('Veuillez compléter tous les champs !', 'error');
      }
    $this->render('Auth');
  }

  /**
  * Logout
  */
  public function logout()
  {
    $this->request->getSession()->destroy();
    $this->redirection('auth', 'login');
  }
}
