<?php

require_once ('../app/Autoloader.php');
Autoloader::register();

$router = new Router();
$router->run();



