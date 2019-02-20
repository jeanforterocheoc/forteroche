<?php
/**
* Cette classe gère les méthodes de l'ensemble des chapitres (CRUD) 
* Côté Backend
*/
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\ChapterManager;
use App\Services\MessageFlash;

class ChapterController extends SecureController
{
  private $chapterManager;
  
  /**
  * Affichage de l'ensemble des chapitres 
  * Pagination sur l'interface
  */
  public function allChapters()
  {
    $chapterManager = new ChapterManager();
    $nbChapters = $chapterManager->countChapters();
    $perPage = 3;
    $nbPages = $chapterManager->countPages($nbChapters, $perPage);

    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    //Début dans l'élément LIMIT de la requête
    $start = ($currentPage-1)*$perPage; 
    $chapters = $chapterManager->getAllChapters($start, $perPage);

    $this->render('AllChapters', array('allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /**
  * Affiche un chapitre  
  */ 
  public function oneChapter()
  {
    $chapterId = $this->request->getParam("id");
    $chapterManager = new ChapterManager();
    $one = $chapterManager->getOneChapter($chapterId);
  
    $this->render('OneChapter', array('oneChapter' => $one));
  }

  /**
  * Créer un chapitre  
  */
  public function newChapter()
  {
    $title = $this->request->defaultParam('title');
    $content = $this->request->defaultParam('mytextarea');

    if (isset($title) && !empty($title) && isset($content) && !empty($content)) {
      $this->redirection('Chapter', 'allChapters');
      $chapterManager = new ChapterManager();
      $chapterManager->addChapter( $title, $content);
    } else {
        $messageFlash = new MessageFlash;
        $messageFlash->setMsg('Veuillez complèter l\'ensemble des champs !' , 'error' );
      } 

    $this->render('NewChapter', array('title' => $title, 'mytextarea' => $content));
  }

  /**
  * Modifier un chapitre  
  */  
  public function changeChapter()
  {
    $chapterId = $this->request->getParam("id");
    $chapterManager = new ChapterManager();
    $post = $chapterManager->getOneChapter($chapterId);

    if ($this->request->paramExist('title') && $this->request->paramExist('mytextarea')) {
      $this->redirection('Chapter', 'allChapters');
      $title = $this->request->getParam("title");
      $content = $this->request->getParam("mytextarea");
      $chapterManager->modifyChapter($title, $content, $chapterId);   
    }

    $this->render('ChangeChapter', array('changeChapter' => $post));
  }

  /**
  * Supprimer un chapitre 
  */ 
  public function deleteChapter()
  {
    $chapterId = $this->request->getParam("id");
    $chapterManager = new ChapterManager();
    $chapter = $chapterManager->getOneChapter($chapterId);

    if (isset($_POST['confirmDelete'])) {
      $chapterManager->removeChapter($chapterId);
      $this->redirection('Chapter', 'allChapters');
    }
    
    $this->render('DeleteChapter', array('deleteChapter' => $chapter));
  }
}
