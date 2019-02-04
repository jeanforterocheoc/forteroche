<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Manager\ChapterManager;

class HomeController extends Controller
{
  private $chapterManager;

  public function homepage()
  {
    $this->chapterManager = new ChapterManager();
    $nbChapters = $this->chapterManager->countChapters();
    $perPage = 1;
    $nbPages = $this->chapterManager->countPages($nbChapters, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    //Début dans l'élément LIMIT de la requête
    $start = ($currentPage-1)*$perPage;     
    $homePost = $this->chapterManager->getAllChapters($start, $perPage);

    $this->render('Home', array('homePage' => $homePost));
  }
}
