<?php
namespace App\Models\Manager;

use App\Models\Manager\PdoManager;

class Manager extends PdoManager
{
    
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