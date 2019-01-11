<?php

require 'model.php';

try
{
    $posts = getPosts();
    require 'viewHome.php';

    // require ('autoloader.php');
    // Autoloader::register();
}
catch(Exception $e){
   $msgError = $e->getMessage() ;
   require 'viewHome.php';
}