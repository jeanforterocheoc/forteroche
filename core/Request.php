<?php

class Request
{
    private $url;
    private $method;
    private $route;
    private $partsUrl = [];

    public function __construct($url)
    {
        $this->setUrl($url);
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setPartsUrl();
    }

    // Setters

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setRoute()
    {
        $this->route =$route;
    }

    public function setPartsUrl()
    {
        $partsUrl = explode('/', $this->url);
        array_shift($partsUrl);
        $this->partsUrl = $partsUrl;
    }
    // Getters

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->$method;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getPartsUrl()
    {
        return $this->partsUrl;
    }

}