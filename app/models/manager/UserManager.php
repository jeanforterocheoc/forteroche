<?php
class UserManager extends Database
{
     /**
    * Profil Admin
    */
    public function getUser()
    { 
        $user = [];
        $req = 'SELECT * FROM users WHERE username = ? AND password = ? ';
        $result = $this->runReq($req, $user);

        foreach ($result as $username) {
            
            $user[] = new User($username) ;
        }

        return $result; 
    }
}