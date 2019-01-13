<?php
// echo $_SERVER['REQUEST_URI'];
// exit;
require_once ('Autoloader.php');
Autoloader::register();

$router = new Router();
$router->routeReq();



