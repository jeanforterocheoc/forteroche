<?php
namespace App\Models\Entity;

class User extends Model
{
  protected $id;
  protected $username;
  protected $password;
  protected $email;

  // Setters
  public function setId(int $userId)
  {
    $userId = (int) $userId;

    if($userId > 0)
    {
      $this->id = $userId;
    }
  }

  public function setUsername(string $username)
  {
    if(is_string($username))
    {
        $this->username = $username;
    }
  }

  public function setPassword($userPassword)
  {
    if(isset($userPassword))
    {
        $this->password = $userPassword;
    }
  }

  public function setEmail($addressMail)
  {
    if(isset($addressMail))
    {
        $this->email = $addressMail;
    }
  }

  // Getters
  public function getId()
  {
      return $this->id;
  }

  public function getUsername()
  {
      return $this->username;
  }

  public function getPassword()
  {
      return $this->password;
  }

  public function getEmail()
  {
      return $this->email;
  }

  public function toArray()
  {
    return get_object_vars($this);
  }
}
