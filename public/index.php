<?php

session_start();
// require_once ('../app/Autoloader.php');
// Autoloader::register();
require_once ('../vendor/autoload.php');

$router = new App\Core\Router();
$router->run();



