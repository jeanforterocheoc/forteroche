<?php
/**
* Cette classe gère l'ensemble des commentaires associés aux différents chapitres  
*/
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\CommentManager;
use App\Models\Manager\ChapterManager;


class CommentController extends SecureController
{
  
  /**
  * Affiche l'ensemble des commentaires 
  */ 
  public function allComments()
  {
    $commentManager = new CommentManager();
    $chapterManager = new ChapterManager();

    $nbComments = $commentManager->countComments();
    $perPage = 15;
    $nbPages = $commentManager->countPages($nbComments, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    $comments = $commentManager->commentsAll($currentPage, $perPage);
    $chapters = $chapterManager->getAllChapters($currentPage, $perPage);

    $this->render('AllComments', array('allComments' => $comments,'allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /** 
  * Validation d'un commentaire  
  */
  public function validate()
  {
    $commentId = $this->request->getParam("id");
    $commentManager = new CommentManager();        
    $commentManager->validateComment($commentId);

    $this->redirection('comment', 'allComments');
  }

  /**
  * Suppression d'un commentaire  
  */ 
  public function delete()
  {
    $commentId = $this->request->getParam("id");
    $commentManager = new CommentManager();
    $commentManager->deleteComment($commentId);
    
    $this->redirection('comment', 'allComments');
  }
}
