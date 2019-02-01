<?php
namespace App\Models;
use App\Core\Config;

class Database{

    protected static $db;

    // Connexion à la base de données et gestion des erreurs
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

    // Récupère l'ensemble des lignes sous forme de tableau
    protected function recoverAll($req, $params = [])
    {
        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Renvoie le résultat d'une ligne sous forme de tableau indexé par la colonne 
    protected function recoverOne($req, $params = [])
    {
        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    // Méthode qui permet d'exécuter, de réaliser des requêtes/actions sql
    protected function runReq($req, $params = [])
    {
        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result;
    }

    
}
