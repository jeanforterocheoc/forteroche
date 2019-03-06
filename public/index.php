<?php
namespace App\Core;
use App\Core\Router;

session_start();

require_once ('../vendor/autoload.php');

$router = new Router();
$router->run();



