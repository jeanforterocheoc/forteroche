<?php
namespace App\Controllers;

use App\Core\SecureController;
use App\Models\manager\UserManager;
use App\Models\User;
use App\Models\Messages;

class UserController extends SecureController
{
  private $userManager;

  // Page accueil de l'administration
  public function userAdmin()
  {
    $this->render('Admin');
  }

  // Création d'un profil utilisateur
  public function createUser()
  {
    if (isset($_POST['login'])) {
      if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if ($_POST['password'] == $_POST['passwordConfirm']) {
          $this->userManager = new UserManager;
          $user = $this->userManager->newUser(
                  $this->request->getParam("username"),
                  $this->request->getParam("password"),
                  $this->request->getParam("email")
                );
          $this->messages = new Messages;
          $this->messages->setMsg('Le profil a été créé !', 'success');
        }
        else {
          $this->messages = new Messages;
          $this->messages->setMsg('Les mots de passe ne correspondent pas !', 'error');
        }
      }
      else {
        $this->messages = new Messages;
        $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
      }
    }
    $this->render('createUser');
  }

  // Modifier un profil
  public function modifyUser()
  {
    $user = $this->user;

    if (isset($_POST['changeProfile'])) {
      if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if($_POST['password']  ==  $_POST['passwordConfirm']) {
          $id = $_POST['id'];
          $username = $this->request->getParam("username");
          $password = $this->request->getParam("password");
          $email = $this->request->getParam("email");
          
          $this->userManager = new UserManager;
          $this->userManager->modifUser($id, $username, $password, $email);

          $this->messages = new Messages;
          $this->messages->setMsg('Les modifications ont été prises en compte !', 'success');
        }
        else {
          $this->messages = new Messages;
          $this->messages->setMsg('Les mots de passe ne correspondent pas !', 'error');
        }
      } 
      else {
        $this->messages = new Messages;
        $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
      }
    }
    $this->render('modifyUser', array('user'=> $user));
  }

}
