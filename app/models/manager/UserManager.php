<?php
class UserManager extends Database
{
    public function login($username, $password)
    {
        
                $req = 'SELECT id FROM users WHERE username = ? AND password = ? ';
                $result = $this->show($req, [$username, $password]);
                return new User($result);

        if (!$result OR !password_verify($_POST['password'], $result['password'])) {
            echo 'incorrect!!';
        }else {
            echo 'ok!!!!!';
        }
        // return new User($result);

    }
    // Vérifie si utilisateur identifié dans la bdd
    public function getUser($username)
    { 
        $req = 'SELECT id, username, password FROM users WHERE username = ? ';
        $result = $this->show($req, [$username]);
        
        if (!$result) {
            return null;
        }
        return new User($result); 
    }

    // Création du profil utilisateur
    public function newUser($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $req = 'INSERT INTO users(username, password, email) VALUES (?, ?, ?)';
        $result = $this->ina($req, [$username, $passwordHash, $email]);
        return $result;
    }

    // // Réinitialisation du mot de passe 
    // public function getPassword($username, $password)
    // {
    //     var_dump($password);
        
    //     $req = 'UPDATE users SET username = ?, pwd = ?  WHERE id = ?';
    //     $result = $this->ina($req, [$username, $password]);
    //     return $result;
    // }
}