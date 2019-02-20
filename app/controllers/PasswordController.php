<?php
/**
* Cette classe permet de réinitialiser le mot de passe du user
*/
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Manager\UserManager;
use App\Models\Entity\User;
use App\Services\MessageFlash;
use App\Services\Mailer;

class PasswordController extends Controller
{
  private $userManager;

  /**
  * Vérification de la validité du mail transmis
  */
  public function checkEmail()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->render('checkEmail');
      return;
    }

    if (isset($_POST['recupSubmit'])) {
      if (isset($_POST['recupMail']) && !empty($_POST['recupMail'])) {
        $recupMail = htmlspecialchars($_POST['recupMail'], ENT_QUOTES);
        if (filter_var($recupMail,FILTER_VALIDATE_EMAIL)) {
          $userManager = new UserManager;
          $mailExist = $userManager->mailExist($recupMail);
          if ($mailExist) {
            $this->request->getSession()->setAttribut("recupMail", $recupMail);
            $this->redirection('password', 'generateCode');
          } else {
              $messageFlash = new MessageFlash;
              $messageFlash->setMsg('Adresse mail incorrecte !', 'error');
            }
        } else {
            $messageFlash = new MessageFlash;
            $messageFlash->setMsg('Adresse mail non valide !', 'error');
          }
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Veuillez entrer une adresse mail !', 'error');
        }
    }
    $this->render('checkEmail');
  }

  /**
   * Création du code de vérification et envoyé par mail
   */
  public function generateCode()
  {
    $recupMail = $this->request->getSession()->getAttribut('recupMail');
    if ($recupMail ) {
      $recupCode = "";
      for ($i=1; $i < 9; $i++) {
        $recupCode .=mt_rand(1, 9);
      }
      $this->request->getSession()->setAttribut("recupCode", $recupCode);
      $userManager = new UserManager;
      $emailRecupExist = $userManager->emailRecupExist($recupMail);
      if ($emailRecupExist == 0) {
        $recordEmailCode = $userManager->recordEmailCode($recupMail, $recupCode);
        $mailer = new Mailer;
        $sendmail = $mailer->sendMail($recupCode);
      }
      $this->checkCode($recupCode);
    }
  }

  /**
  * Vérification du code transmis, si ok suppression email et code dans la table
  */
  public function checkCode($recupCode)
  {
    if (isset($_POST['checkSubmit'])) {
      if (isset($_POST['checkCode']) && !empty($_POST['checkCode'])) {
        $checkCode = htmlspecialchars($_POST['checkCode'], ENT_QUOTES);
        $userManager = new UserManager;
        $recupMail = $this->request->getSession()->getAttribut('recupMail');
        $isCode = $userManager->isCode($recupMail,$checkCode);
        if ($isCode == 1) {
          $this->redirection('password', 'newPass');
          $deleteMail = $userManager->deleteMail($recupMail);
        } else {
            $messageFlash = new MessageFlash;
            $messageFlash->setMsg('Code incorrect !', 'error');
          }
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Veuillez entrer votre code', 'error');
        }
    }
    $this->render('checkCodeUser');
  }

  /**
  * Modification du mot de passe
  */
  public function newPass()
  {
    if (isset($_POST['validateSubmit'])) {
      if (isset($_POST['newPass']) && !empty($_POST['newPass'])) {
        if (isset($_POST['checkNewPass']) && !empty($_POST['checkNewPass'])) {
          $newPass = htmlspecialchars($_POST['newPass'], ENT_QUOTES);
          $checkNewPass = htmlspecialchars($_POST['checkNewPass'], ENT_QUOTES);
          if ($newPass == $checkNewPass) {
            $this->request->getSession()->setAttribut("newPass", $newPass);
            $this->userManager = new UserManager;
            $newPass = $this->request->getSession()->getAttribut('newPass');
            $email = $this->request->getSession()->getAttribut('recupMail');
            $createNewPass = $this->userManager->createNewPass($newPass,$email);
            $this->redirection('user', 'userAdmin');
          } else {
              $messageFlash = new MessageFlash;
              $messageFlash->setMsg('Les mots de passe ne correspondent pas!', 'error');
            }
        } else {
            $messageFlash = new MessageFlash;
            $messageFlash->setMsg('Veuillez confirmer votre nouveau mot de passe', 'error');
          }
      } else {
          $messageFlash = new MessageFlash;
          $messageFlash->setMsg('Veuillez indiquer votre nouveau mot de passe', 'error');
        }
    }
    $this->render('newPass');
  }
}