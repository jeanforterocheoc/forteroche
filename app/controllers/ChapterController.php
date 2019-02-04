<?php
/**
* Cette classe gère les méthodes de l'ensemble des chapitres (CRUD) 
* Côté Backend
*/
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\ChapterManager;
use App\Models\Entity\Messages;

class ChapterController extends SecureController
{
  private $chapterManager;
  
  /**
  * Affichage de l'ensemble des chapitres 
  * Pagination sur l'interface
  */
  public function allChapters()
  {
    $this->chapterManager = new ChapterManager();
    $nbChapters = $this->chapterManager->countChapters();
    $perPage = 3;
    $nbPages = $this->chapterManager->countPages($nbChapters, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    //Début dans l'élément LIMIT de la requête
    $start = ($currentPage-1)*$perPage; 
    $chapters = $this->chapterManager->getAllChapters($start, $perPage);

    $this->render('AllChapters', array('allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /**
  * Affiche un chapitre  
  */ 
  public function oneChapter()
  {
    $chapterId = $this->request->getParam("id");
    $this->chapterManager = new ChapterManager();
    $one = $this->chapterManager->getOneChapter($chapterId);
  
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
      $this->chapterManager = new ChapterManager();
      $this->chapterManager->addChapter( $title, $content);
    } else {
        $this->messages = new Messages;
        $this->messages->setMsg('Veuillez complèter l\'ensemble des champs !' , 'error' );
      }
        
    $this->render('NewChapter', array('title' => $title, 'mytextarea' => $content));
  }

  /**
  * Modifier un chapitre  
  */  
  public function changeChapter()
  {
    $chapterId = $this->request->getParam("id");
    $this->chapterManager = new ChapterManager();
    $post = $this->chapterManager->getOneChapter($chapterId);
    if ($this->request->paramExist('title') && $this->request->paramExist('mytextarea')) {
      $this->redirection('Chapter', 'allChapters');
      $title = $this->request->getParam("title");
      $content = $this->request->getParam("mytextarea");
      $this->chapterManager->modifyChapter($title, $content, $chapterId);   
    }

    $this->render('changeChapter', array('changeChapter' => $post));
  }

  /**
  * Supprimer un chapitre 
  */ 
  public function deleteChapter()
  {
    $chapterId = $this->request->getParam("id");
    $this->chapterManager = new ChapterManager();
    $chapter = $this->chapterManager->getOneChapter($chapterId);
      if (isset($_POST['confirmDelete'])) {
        $this->chapterManager->removeChapter($chapterId);
        $this->redirection('Chapter', 'allChapters');
      }
    $this->render('DeleteChapter', array('deleteChapter' => $chapter));
  }
}
