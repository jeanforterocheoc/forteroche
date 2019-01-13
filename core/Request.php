<?php
require_once ('Autoloader.php');
Autoloader::register();

class Request
{
    private $session;

    private $params;

    public function __construct($params)
    {
        $this->params = $params;
        // $this->session = new Session();
    }

    // public function getSession()
    // {
    //     return $this->session;
    // }

    public function getParam($name)
    {
        if($this->isParam($name))
        {
            return $this->params[$name];
        }
        else 
        {
            throw new Exception('Le paramètre '.$name.' n\'est pas valide' );
        }
    }

    public function isParam($name)
    {
        return(isset($this->params[$name]) && $this->params[$name] != "");
    }
}
