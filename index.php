<?php

require_once ('Autoloader.php');
Autoloader::register();

// $router = new Router();
// $router->routeReq();

// die($_GET['url']);
$router = new Router($_GET['url']);

$router->get('/', function(){echo 'Homepage';});
$router->get('/posts', function(){echo'Tous les épisodes';});
// $router->get('/posts/:id', function($id){echo'Afficher l\'épisode '.$id;})->with('id', '[0-9]+');
$router->get('/posts/:postId', "Post#post");
$router->post('/comments/:id', function($id){echo'Commentaires pour l\'épisode'.$id;});

$router->run();
