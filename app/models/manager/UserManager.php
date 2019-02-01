<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\User;

class UserManager extends Database
{

    // Vérifie si utilisateur identifié dans la bdd
    public function getUser($username)
    {
        $req = 'SELECT *
                FROM user
                WHERE username = ? ';
        $result = $this->recoverOne($req, [$username]);

        if (!$result) {
            return null;
        }
        return new User($result);
    }

     // Renvoi les infos sur un profil utilisateur 
     public function getOneUser($id)
     {
         $req = 'SELECT * 
                 FROM user 
                 WHERE id = ?';
         $result = $this->recoverOne($req,[$id]);
         return new User ($result);
     }

    // Afficher la liste des profil
    public function listUser()
    {
        $users = [];
        $req = 'SELECT * FROM user';
        $result = $this->recoverAll($req);
        foreach ($result as $user) {
            $users[] = new User($user);
        }
        return $users ;
    }

    //Compte le nombre de profils enregistrés dans la bdd
    public function countUsers()
    {
        $nbUser = '';
        $req ='SELECT COUNT(*) AS nbUsers FROM user';
        $result = $this->recoverAll($req);
        foreach ($result as $value) {
            $nbUser = $value['nbUsers'];
        }
        // var_dump($nbUser);
        return $nbUser;
    }

    // Création du profil utilisateur
    public function newUser($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $req = 'INSERT INTO user(username, password, email) VALUES (?, ?, ?)';
        $result = $this->runReq($req, [$username, $passwordHash, $email]);
        return $result;
    }

    // Modification du profil user session
    public function modifUser($id, $username, $password, $email){
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      $req = 'UPDATE user
              SET username = ?, password = ?, email = ?
              WHERE id = '.$id ;
      $result = $this->runReq($req, [$username, $passwordHash, $email]);
      return $result;
    }

    // Modifier un profil utilisateur
    public function changeProfUser($id, $username, $password, $email){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $req = 'UPDATE user
                SET username = ?, password = ?, email = ?
                WHERE id = '.$id ;
        $result = $this->runReq($req, [$username, $passwordHash, $email]);
        return $result;
      }
    // Création d'un nouveau mot de passe
    public function createNewPass($newPass,$email)
    {
        $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
        $req = 'UPDATE user
                SET password = ?
                WHERE email = ?';
        $result = $this->runReq($req, [$newPassHash, $email]);
        
        return $result;
    }

    // Supprimer un profil utilisateur
    public function deleteProfilUser($userId)
    {
        $req = 'DELETE FROM user WHERE id = ?';
        $result = $this->runReq($req, [$userId]);
        return $result;
    }

/**
 * REINITIALISATION DU MOT DE PASSE
 */
    // Vérification email présent dans bdd
    public function mailExist($recup_mail)
    {
        $req = 'SELECT id FROM user  WHERE email = ?';
        $result = $this->recoverOne($req, [$recup_mail]);
        return $result;
    }


    public function emailRecupExist($recup_mail)
    {
        $req = 'SELECT id FROM forgetpass  WHERE email = ?';
        $result = $this->runReq($req, [$recup_mail]);
        $result = $result->rowCount();
        return $result;
    }

    public function recupUpdate($recup_code, $recup_mail)
    {
        $req = 'UPDATE forgetpass SET code = ? WHERE email = ?';
        $result = $this->runReq($req, [$recup_code, $recup_mail]);
        return $result;
    }

    public function recupInsert($recup_mail, $recup_code)
    {
        $req = 'INSERT INTO forgetpass(email,code) VALUES (?, ?)';
        $result = $this->runReq($req, [$recup_mail, $recup_code]);
        return $result;
    }

    // Envoie mail
    public function sendMail($recup_code)
    {
        ini_set('SMTP','smtp.free.fr');
        ini_set('sendmail_from','ocphpyb@gmail.com');
        $mail = 'jeanforte49@gmail.com';
        $sujet = 'Récupération de mot de passe';
        $message = 'Voici votre code de récupération : '.$recup_code.'
        ';
        // Envoi du mail
        mail($mail, $sujet, $message);
    }

    public function isCode($recup_mail,$verif_code)
    {
        $req = 'SELECT id FROM forgetpass  WHERE email = ? AND code = ?';
        $result = $this->runReq($req, [$recup_mail, $verif_code]);
        $result = $result->rowCount();
        return $result;
    }

    public function delMail($recup_mail)
    {
        $req ='DELETE FROM forgetpass WHERE email = ?';
        $result = $this->runReq($req, [$recup_mail]);
        return $result;
    }
}
