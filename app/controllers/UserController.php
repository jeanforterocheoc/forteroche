<?php
namespace App\Controllers;

use App\Core\SecureController;
use App\Models\manager\UserManager;
use App\Models\manager\ChapterManager;
use App\Models\manager\CommentManager;
use App\Models\User;
use App\Models\Messages;


class UserController extends SecureController
{
  private $userManager;


  // Page accueil de l'administration
  public function userAdmin()
  {
    // var_dump($_SESSION);
    $this->userManager = new UserManager;
    $user = $this->user;
    // var_dump($user);
    // $username = $this->userManager->getUser(json_decode($this->user, true));
    $nbProfil = $this->userManager->countUsers();

    $this->chapterManager = new ChapterManager;
    $nbChapter = $this->chapterManager->countChapters();

    $this->commentManager = new CommentManager;
    $nbComments = $this->commentManager->countComments();
    $nbReport = $this->commentManager->countReport();

    $this->render('Admin', array('profil' => $nbProfil, 'chapter' => $nbChapter, 'comments' => $nbComments, 'report' => $nbReport));
  }

  // Editer un profil
  public function ListUser()
  {
    $this->userManager = new UserManager;
    $users = $this->userManager->listUser();
    $profil = $this->userManager->countUsers();
    $this->render('listUser', array('listUser' => $users, 'profil' => $profil));
  } 

  // Modifier un profil utilisateur
  public function oneUser()
  {
    $id = htmlspecialchars($_GET['id']);
    $this->userManager = new UserManager;
    $oneProfilUser = $this->userManager->getOneUser($id);
    
    if (isset($_POST['changeProfileUser'])) {
      if ($this->request->paramExist('changeUsername') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if($_POST['password']  ==  $_POST['passwordConfirm']) {
          $id = $_POST['id'];
          $username = $this->request->getParam("changeUsername");
          $password = $this->request->getParam("password");
          $email = $this->request->getParam("email");
         
          $this->userManager = new UserManager;
          $this->userManager->changeProfUser($id, $username, $password, $email);
          // $this->redirection('User', 'oneUser/'.$id); 
          $this->redirection('User', 'listUser'); 
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
  $this->render('changeprofilUser', array('oneUser' => $oneProfilUser));
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

  // Supprimer un profil utilisateur
  public function deleteUser()
  {
    $this->userManager = new UserManager;
    $userId = $this->request->getParam('id');
    $this->userManager->deleteProfilUser($userId);
     
  }

  // Modifier un profil (du user Session)
  public function modifyUser()
  {
    // var_dump($_SESSION);
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
