<?php
class UserManager extends Database
{

    // Vérifie si utilisateur identifié dans la bdd
    public function getUser($username, $password)
    { 
        $req = 'SELECT * FROM users WHERE username = ? AND password = ? ';
        $result = $this->show($req, [$username, $password]);
        
        if (!$result) {
            return null;
        }
        return new User($result); 
    }
}