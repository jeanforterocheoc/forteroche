<?php
/**
 * Cette classe gère le profil de l'utilisateur
 */
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\UserManager;
use App\Models\Manager\ChapterManager;
use App\Models\Manager\CommentManager;
use App\Models\Entity\User;
use App\Models\Entity\Messages;


class UserController extends SecureController
{
  private $userManager;

  /** 
  * Page accueil de l'administration  
  */ 
  public function userAdmin()
  {
    $this->userManager = new UserManager;
    $user = $this->user;
    $nbProfil = $this->userManager->countUsers();

    $this->chapterManager = new ChapterManager;
    $nbChapter = $this->chapterManager->countChapters();

    $this->commentManager = new CommentManager;
    $nbComments = $this->commentManager->countComments();
    $nbReport = $this->commentManager->countReport();

    $this->render('Admin', array('user' => $this->user, 'profil' => $nbProfil, 'chapter' => $nbChapter, 'comments' => $nbComments, 'report' => $nbReport));
  }

  /**
  * Editer un profil
  */
  public function listUser()
  {
    $this->userManager = new UserManager;
    $users = $this->userManager->listUser();
    $this->render('listUser', array('listUser' => $users));
  } 

  /**
  * Modifier un profil 
  */
  public function oneUser()
  {
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    $this->userManager = new UserManager;
    $oneProfilUser = $this->userManager->getOneUser($id);
    
    if (isset($_POST['changeProfileUser'])) {
      if ($this->request->paramExist('changeUsername') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if($_POST['password']  ==  $_POST['passwordConfirm']) {
          $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
          $username = htmlspecialchars($this->request->getParam("changeUsername"), ENT_QUOTES);
          $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
          $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);
         
          $this->userManager = new UserManager;
          $this->userManager->changeProfUser($id, $username, $password, $email);
           
          $this->redirection('User', 'listUser'); 
        } else {
            $this->messages = new Messages;
            $this->messages->setMsg('Les mots de passe ne correspondent pas !', 'error');
          }
      } else {
          $this->messages = new Messages;
          $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
        } 
    }
  $this->render('changeprofilUser', array('oneUser' => $oneProfilUser));
  }
  
  /**
   * Création d'un profil utilisateur
   */
  public function createUser()
  {
    if (isset($_POST['login'])) {
      if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if ($_POST['password'] == $_POST['passwordConfirm']) {
          $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
          $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
          $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);

          $this->userManager = new UserManager;
          $user = $this->userManager->newUser($username, $password, $email);
                  
          $this->messages = new Messages;
          $this->messages->setMsg('Le profil a été créé !', 'success');
        } else {
            $this->messages = new Messages;
            $this->messages->setMsg('Les mots de passe ne correspondent pas !', 'error');
          } 
      } else {
          $this->messages = new Messages;
          $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
        }
    }
    $this->render('createUser');
  }

  /**
   * Supprimer un profil utilisateur
   */
  public function deleteUser()
  {
    $this->userManager = new UserManager;
    $userId = $this->request->getParam('id');
    $this->userManager->deleteProfilUser($userId);
     
  }

  /**
   * Modifier profil user Session
   */
  public function modifyUser()
  {
    
    $user = $this->user;

    if (isset($_POST['changeProfile'])) {
      if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) {
        if($_POST['password']  ==  $_POST['passwordConfirm']) {
          $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
          $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
          $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);
          $email = htmlspecialchars($this->request->getParam("email"), ENT_QUOTES);
          
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
