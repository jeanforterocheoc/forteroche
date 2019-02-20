<?php
namespace App\Models\Entity;

class User extends Model
{
  private $id;
  private $username;
  private $password;
  private $email;

  // SETTERS
  public function setId(int $userId)
  {
    $userId = (int) $userId;

    if ($userId > 0) {
      $this->id = $userId;
    }
  }

  public function setUsername(string $username)
  {
    if (is_string($username)) {
      $this->username = $username;
    }
  }

  public function setPassword($userPassword) 
  {
    if (isset($userPassword)) {
      $this->password = $userPassword;
    }
  }

  public function setEmail($addressMail)
  {
    if(isset($addressMail)) {
      $this->email = $addressMail;
    }
  }

  // GETTERS
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

  public function toArray() // Retourne dans un tableau associatif les propriétés de User
  {
    return get_object_vars($this);
  }
}
