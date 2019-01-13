<?php
class User extends Model
{
    private $id;
    private $login;
    private $password;

    public function setId($userId)
    {
        $userId = (int) $userId;

        if($userId > 0)
        {
            $this->id = $userId;
        }
    }

    public function setLogin($userLogin)
    {
        if(is_string($userLogin))
        {
            $this->login = $userLogin;
        }
    }

    public function setPassword($userPassword)
    {
        if($userPassword)
        {
            $this->password = $userPassword;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login; 
    }

    public function getPassword()
    {
        return $this->password;
    }
}