<?php
// echo $_SERVER['REQUEST_URI'];
// exit;

require_once ('Autoloader.php');
Autoloader::register();

// die($_GET['url']);

$router = new Router($_GET['url']);


$router->get('/home/posts', 'Home#posts');
$router->get('/post/:id', 'Post#post');


$router->run();



