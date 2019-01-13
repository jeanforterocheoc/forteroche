<?php
class Request
{
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function paramExist($name)
    {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    public function getParam($name)
    {
        if ($this->paramExist($name))
        {
            return $this->params[$name];
        }
        else {
            throw new \Exception("Le paramètre '$name' introuvable!");
        }
    }

}