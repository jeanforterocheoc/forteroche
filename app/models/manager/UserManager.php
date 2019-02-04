<?php
namespace App\Models\Manager;

use App\Models\Entity\Database;
use App\Models\Entity\User;

class UserManager extends Database
{
  /**
  *  Vérifie si l'utilisateur est enregistré
  */
  public function getUser($username)
  {
    $req = 'SELECT *
            FROM user
            WHERE username = ? 
            ';
    $result = $this->findOne($req, [$username]);
    if (!$result) {
        return null;
    }
    return new User($result);
  }

  /**
  * Renvoi les informations d'un profil
  */
  public function getOneUser($id)
  {
    $req = 'SELECT * 
            FROM user 
            WHERE id = ?';
    $result = $this->findOne($req, [$id]);
    return new User($result);
  }

  /**
  * Retourne l'ensemble des profils
  */
  public function listUser()
  {
    $users = [];
    $req = 'SELECT * FROM user';
    $result = $this->findAll($req);
    foreach ($result as $user) {
      $users[] = new User($user);
    }
      return $users ;
  }

  /**
  * Comptabilise les profils enregistrés dans la bdd
  */
  public function countUsers()
  {
    $nbUser = '';
    $req ='SELECT COUNT(*) AS nbUsers FROM user';
    $result = $this->findAll($req);
    if (!$result) {
      return $nbUser;
      }
      foreach ($result as $value) {
        $nbUser = $value['nbUsers'];
      }
      return $nbUser;
    }

    /**
    * Création du profil utilisateur
    */
    public function newUser($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $req = 'INSERT INTO user(username, password, email) VALUES (?, ?, ?)';
        $result = $this->runReq($req, [$username, $passwordHash, $email]);
        return $result;
    }

  /**
  * Modification du profil user session
  */
  public function modifUser($id, $username, $password, $email)
  {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $req = 'UPDATE user
            SET username = ?, password = ?, email = ?
            WHERE id = '.$id ;
    $result = $this->runReq($req, [$username, $passwordHash, $email]);
    return $result;
  }

  /**
  * Modifier un profil utilisateur
  */
  public function changeProfUser($id, $username, $password, $email)
  {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $req = 'UPDATE user
            SET username = ?, password = ?, email = ?
            WHERE id = '.$id ;
    $result = $this->runReq($req, [$username, $passwordHash, $email]);
    return $result;
  }

  /**
  * Création d'un nouveau mot de passe
  */
  public function createNewPass($newPass, $email)
  {
    $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
    $req = 'UPDATE user
            SET password = ?
            WHERE email = ?
            ';
    $result = $this->runReq($req, [$newPassHash, $email]);
    return $result;
  }

  /**
  * Suppression d'un profil utilisateur
  */
  public function deleteProfilUser($userId)
  {
    $req = 'DELETE FROM user WHERE id = ?';
    $result = $this->runReq($req, [$userId]);
    return $result;
  }

  /**
  * Envoi un mail à l'auteur(formulaire contact)
  */
  public function sendMailAuthor($pseudo, $email, $messageUser)
  {
    ini_set('SMTP', 'smtp.free.fr');
    ini_set('sendmail_from', 'ocphpyb@gmail.com');
    $mail = 'jeanforte49@gmail.com';
    $sujet = 'Message pour Jean Forteroche' ;
    $message = 'De: '.$pseudo.' Email: '.$email.' Voici le message : '.$messageUser.'
    ';
    
    mail($mail, $sujet, $message);
  }

  
  // REINITIALISATION DU MOT DE PASSE
  
  /**
  * Vérifie si l'email est présent dans la bdd
  */
  public function mailExist($recup_mail)
  {
    $req = 'SELECT id FROM user  WHERE email = ?';
    $result = $this->findOne($req, [$recup_mail]);
    return $result;
  }

  /**
  * Récupération de l'email
  */
  public function emailRecupExist($recup_mail)
  {
    $req = 'SELECT id FROM forgetpass  WHERE email = ?';
    $result = $this->runReq($req, [$recup_mail]);
    $result = $result->rowCount();
    return $result;
  }

  /**
  * Mise à jour dans la table forgetpass de l'email et du code associé
  */
  public function recupUpdate($recup_code, $recup_mail)
  {
    $req = 'UPDATE forgetpass SET code = ? WHERE email = ?';
    $result = $this->runReq($req, [$recup_code, $recup_mail]);
    return $result;
  }

  /**
  * Enregistre email et code si pas présents dans la table forgetpass
  */
  public function recupInsert($recup_mail, $recup_code)
  {
    $req = 'INSERT INTO forgetpass(email,code) VALUES (?, ?)';
    $result = $this->runReq($req, [$recup_mail, $recup_code]);
    return $result;
  }

  /**
  * Envoi d'un mail à l'utilisateur avec le code
  */
  public function sendMail($recup_code)
  {
    ini_set('SMTP', 'smtp.free.fr');
    ini_set('sendmail_from', 'ocphpyb@gmail.com');
    $mail = 'jeanforte49@gmail.com';
    $sujet = 'Récupération de mot de passe';
    $message = 'Voici votre code de récupération : '.$recup_code.'
    ';
    
    mail($mail, $sujet, $message);
    }

  /**
  * Récupère l'association email/code
  */
  public function isCode($recup_mail, $verif_code)
  {
    $req = 'SELECT id FROM forgetpass  WHERE email = ? AND code = ?';
    $result = $this->runReq($req, [$recup_mail, $verif_code]);
    $result = $result->rowCount();
    return $result;
  }

  /**
  * Supprime l'enregistrement
  */
  public function delMail($recup_mail)
  {
    $req ='DELETE FROM forgetpass WHERE email = ?';
    $result = $this->runReq($req, [$recup_mail]);
    return $result;
  }
}
