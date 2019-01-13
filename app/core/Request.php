<?php
/**
 * Cette classe stocke l'ensemble des paramètres de la requête de l'utilisateur 
 */
class Request
{

    private $params;

    /**
     * Instancie les paramètres de la requête
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Renvoie un booléen si le paramètre existe dans la requête 
     */
    public function paramExist($name)
    {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    /**
     * Renvoie la valeur du paramètre 
    */
    public function getParam($name)
    {
        if ($this->paramExist($name))
        {
            return $this->params[$name];
        }
        else {
            throw new \Exception("Paramètre '$name' introuvable!");
        }
    }

    /**
     * Renvoie les valeurs des paramètres par défaut
    */
    public function defaultParam($name, $default = null)
    {
        try
        {
            return $this->getParam($name);
        }
        catch(Exception $e)
        {
            return $default;
        }
    }

}