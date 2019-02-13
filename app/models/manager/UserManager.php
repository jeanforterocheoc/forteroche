<?php
namespace App\Models\Manager;

use App\Models\Manager\Manager;
use App\Models\Entity\User;

class UserManager extends Manager
{
  /**
  *  Vérifie si l'utilisateur est enregistré
  */
  public function checkUser($username)
  {
    $req = 'SELECT * FROM user WHERE username = ?';
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
    $req = 'SELECT * FROM user WHERE id = ?';
    $result = $this->findOne($req, [$id]);
    if (!$result) {
      return null;
    }
    return new User($result);
  }

  /**
  * Retourne l'ensemble des profils
  */
  public function listUsers()
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
    $result = $this->findOne($req);
    return $result['nbUsers'];
  }

  /**
  * Création du profil utilisateur
  */
  public function newUser($username, $password, $email)
  {
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      $req = 'INSERT INTO user(username, password, email) VALUES (?, ?, ?)';
      $result = $this->runReq($req, [$username, $passwordHash, $email]);
      if ($result) {
        return new User(['username' => $username, 'email' => $email]);
      }
      return null;
  }

  /**
  * Modification du profil user session
  */
  public function modifUser($id, $username, $password, $email)
  {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $req = 'UPDATE user SET username = ?, password = ?, email = ? WHERE id = '.$id ;
    $result = $this->runReq($req, [$username, $passwordHash, $email]);
    if ($result) {
      return new User(['username' => $username, 'email' => $email]);
    }
    return null;
  }

  /**
  * Modifier un profil 
  */
  public function changeProfil($id, $username, $password, $email)
  {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $req = 'UPDATE user SET username = ?, password = ?, email = ? WHERE id = '.$id ;
    $result = $this->runReq($req, [$username, $passwordHash, $email]);
    if ($result) {
      return new User(['username' => $username, 'email' => $email]);
    }
    return null;
  }

  /**
  * Création d'un nouveau mot de passe
  */
  public function createNewPass($newPass, $email)
  {
    $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
    $req = 'UPDATE user SET password = ? WHERE email = ?';
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

  // REINITIALISATION DU MOT DE PASSE
  
  /**
  * Vérifie si l'email est présent dans la bdd (checkEmail)
  */
  public function mailExist($recupMail)
  {
    $req = 'SELECT id FROM user  WHERE email = ?';
    $result = $this->findOne($req, [$recupMail]);
    return $result;
  }

  /**
  * Récupération de l'email
  */
  public function emailRecupExist($recupMail)
  {
    $req = 'SELECT id FROM forgetpass  WHERE email = ?';
    $result = $this->runReq($req, [$recupMail]);
    $result = $result->rowCount();
    return $result;
  }

  /**
  * Enregistre email et code dans la table forgetpass
  */
  public function recordEmailCode($recupMail, $recupCode)
  {
    $req = 'INSERT INTO forgetpass(email,code) VALUES (?, ?)';
    $result = $this->runReq($req, [$recupMail, $recupCode]);
    return $result;
  }

  /**
  * Récupère l'association email/code
  */
  public function isCode($recupMail, $checkCode)
  {
    $req = 'SELECT id FROM forgetpass  WHERE email = ? AND code = ?';
    $result = $this->runReq($req, [$recupMail, $checkCode]);
    $result = $result->rowCount();
    return $result;
  }

  /**
  * Supprime l'enregistrement dans la table forgetPass
  */
  public function deleteMail($recupMail)
  {
    $req ='DELETE FROM forgetpass WHERE email = ?';
    $result = $this->runReq($req, [$recupMail]);
    return $result;
  }
}
