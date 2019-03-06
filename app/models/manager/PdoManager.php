<?php
namespace App\Models\Manager;

use App\Core\Config;

class PdoManager{

  private static $db;

  /**
  * Connexion à la base de données et gestion des erreurs 
  */
  protected static function getDb()
  {
    if (self::$db === null) {
      // Récupération des paramètres de configuration
      $dsn = Config::get('dsn');
      $login = Config::get('login');
      $pwd = Config::get('pwd');

      $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];

      // Création de la connexion
      self::$db = new \PDO ($dsn, $login, $pwd, $options);
    }
    return self::$db;
  }
}
