<?php
// echo $_SERVER['REQUEST_URI'];
// exit;

require_once ('../app/Autoloader.php');
Autoloader::register();

// die($_GET['url']);

$router = new Router();

// $router->get('/home/homepage', 'Home#homePage');
// $router->get('/posts/posts', 'Posts#posts');
// $router->get('/post/:id', 'Post#postComment');

// $router->post('/comment', 'Comment#addComment');

$router->run();



