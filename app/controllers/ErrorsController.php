<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorsController extends Controller 
{
  private $error404;

  function __construct()
  {
    //    echo('Erreur 404 : La page n\'existe pas!');
    $error404 = $this->error404();
   }

  public function error404()
  {
    $this->render('error404');
  }
}