<?php
// echo $_SERVER['REQUEST_URI'];
// exit;
require_once ('Autoloader.php');
Autoloader::register();




$router = new Router($_GET['url']);
// $router->routeReq();

// $router->get('/', function(){echo "Homepage";});
// $router->get('/posts', function(){echo "Affichage de l'ensemble des articles";});
// $router->get('/posts/:id', function($id){echo "Affichage de l'article ".$id;})->with('id', '[0-9]+');
$router->get('/home/', "Home#posts");

// $router->post('/posts/:id', function($id){echo "Commentaires à propos de l'article ".$id;});


$router->run();


