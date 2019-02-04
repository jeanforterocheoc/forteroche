<?php
namespace App\Models\Entity;

use App\Core\Config;

class Database{

  protected static $db;

  /**
  * Connexion à la base de données et gestion des erreurs 
  */
  private static function getDb()
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

  /**
  * Retourne l'ensemble des lignes sous forme de tableau
  */
  protected function findAll($req, array $params = [])
  {
    $result = self::getDb()->prepare($req);
    $result->execute($params);

    return $result->fetchAll(\PDO::FETCH_ASSOC);
  }

  /**
  * Retourne le résultat d'une ligne sous forme de tableau indexé par la colonne 
  */ 
  protected function findOne($req, array $params = [])
  {
    $result = self::getDb()->prepare($req);
    $result->execute($params);

    return $result->fetch(\PDO::FETCH_ASSOC);
  }

  /**
  * Méthode qui permet d'exécuter une requête simple sans fetch
  */
  protected function runReq($req, array $params = [])
  {
    $result = self::getDb()->prepare($req);
    $result->execute($params);

    return $result;
  }  
}
