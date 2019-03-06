<?php
/** 
 * Cette classe gère la page d'accueil
 * Côté Frontend
 */
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Manager\ChapterManager;

class HomeController extends Controller
{
  
  public function homepage()
  {
    $chapterManager = new ChapterManager();
    $nbChapters = $chapterManager->countChapters();
    $perPage = 1;
    $nbPages = $chapterManager->countPages($nbChapters, $perPage);
    
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    $start = ($currentPage-1)*$perPage; //Début dans l'élément LIMIT de la requête     
    $homePost = $chapterManager->getAllChapters($start, $perPage);

    $this->render('Home', array('homePage' => $homePost));
  }
}
