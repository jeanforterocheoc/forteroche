<?php
/**
 * Cette classe gère le profil de l'utilisateur
 */
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\UserManager;
use App\Models\Manager\ChapterManager;
use App\Models\Manager\CommentManager;
use App\Services\MessageFlash;


class UserController extends SecureController
{
  
  /** 
  * Page accueil de l'administration  
  */ 
  public function homepageAdmin()
  {
    $userManager = new UserManager;
    $user = $this->user;
    
    $nbProfil = $userManager->countUsers();

    $chapterManager = new ChapterManager;
    $nbChapter = $chapterManager->countChapters();

    $commentManager = new CommentManager;
    $nbComments = $commentManager->countComments();
    $nbReport = $commentManager->countReport();

    $this->render('homepageAdmin', array('user' => $user, 'profil' => $nbProfil, 'chapter' => $nbChapter, 'comments' => $nbComments, 'report' => $nbReport));
  }

  /**
  * Edite la liste des profils utilisateurs enregistrés
  */
  public function usersList()
  {
    $userManager = new UserManager;
    $users = $userManager->listUsers();
    $this->render('usersList', array('usersList' => $users));
  } 

  /**
  * Modifier un profil 
  */
  public function changeUser()
  {
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    $userManager = new UserManager;
    $userProfil = $userManager->getOneUser($id);
    
    if (!isset($_POST['changeProfileUser'])) {
      $this->render('changeUser', array('oneUser' => $userProfil));
      return;
    }

    if ($this->request->paramExist('changeUsername') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
      if ($_POST['password']  ==  $_POST['passwordConfirm']) {
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
        $username = htmlspecialchars($this->request->getParam("changeUsername"), ENT_QUOTES);
        $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
        $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);
       
        $userManager = new UserManager;
        $userManager->changeProfil($id, $username, $password, $email);
         
        $this->redirection('user', 'usersList'); 
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Les mots de passe ne correspondent pas !', 'error');
        }
    } else {
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Veuillez remplir tous les champs !', 'error');
      } 
    $this->render('changeUser', array('oneUser' => $userProfil));
  }
  
  /**
   * Création d'un profil utilisateur
   */
  public function createUser()
  {
    
    if (!isset($_POST['login'])) {
      $this->render('createUser');
      return;
    }

    if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
      if ($_POST['password'] == $_POST['passwordConfirm']) {
        $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
        $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
        $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);

        $userManager = new UserManager;
        $userManager->newUser($username, $password, $email);
                
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Le profil a été créé !', 'success');
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Les mots de passe ne correspondent pas !', 'error');
        } 
    } else {
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Veuillez remplir tous les champs !', 'error');
      }
    $this->render('createUser');
  }

  /**
   * Supprimer un profil utilisateur
   */
  public function deleteUser()
  {
    $userManager = new UserManager;
    $userId = $this->request->getParam('id');
    $userManager->deleteProfilUser($userId);
  }

  /**
   * Modifie le profil de l'utilisateur en Session
   */
  public function changeUserSession()
  {
    $user = $this->user;

    if (!isset($_POST['changeProfile'])) { 
      $this->render('changeUserSession', array('user'=> $user));
      return;
    }
    
    if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
      if ($_POST['password']  ==  $_POST['passwordConfirm']) {
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
        $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
        $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
        $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);
      
        $userManager = new UserManager;
        $user = $userManager->modifUser($id, $username, $password, $email);
        
        $this->request->getSession()->setAttribut('user', json_encode($user->toArray()));
       
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Les modifications ont été prises en compte!', 'success');

        // $this->redirection('user', 'changeUserSession');
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Les mots de passe ne correspondent pas!', 'error');
        }
    } else {
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Veuillez remplir tous les champs!', 'error');
      }
    
    $this->render('changeUserSession', array('user'=> $user));
  }
}
