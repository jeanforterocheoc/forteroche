<?php
class User extends Model
{
    private $id;
    private $username;
    private $password;

    public function setId($userId)
    {
        $userId = (int) $userId;

        if($userId > 0)
        {
            $this->id = $userId;
        }
    }

    public function setName($userName)
    {
        if(is_string($userName))
        {
            $this->username = $userName;
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
        return $this->username; 
    }

    public function getPassword()
    {
        return $this->password;
    }
}