<?php
/**
* Cette classe gère l'ensemble des commentaires associés aux différents chapitres  
*/
namespace App\Controllers;

use App\Controllers\SecureController;
use App\Models\Manager\CommentManager;
use App\Models\Manager\ChapterManager;
use App\Models\Entity\Messages;

class CommentController extends SecureController
{
  private $commentManager;
  private $chapterManager;

  /**
  * Affiche l'ensemble des commentaires 
  */ 
  public function allComments()
  {
    $this->commentManager = new CommentManager();
    $this->chapterManager = new ChapterManager();

    $nbComments = $this->commentManager->countComments();
    $perPage = 15;
    $nbPages = $this->commentManager->countPages($nbComments, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    $comments = $this->commentManager->commentsAll($currentPage, $perPage);
    $chapters = $this->chapterManager->getAllChapters($currentPage, $perPage);

    $this->render('AllComments', array('allComments' => $comments,'allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /** 
  * Validation d'un commentaire  
  */
  public function validate()
  {
    $commentId = $this->request->getParam("id");
    $this->commentManager = new CommentManager();        
    $this->commentManager->validateComment($commentId);

    $this->redirection('comment', 'allComments');
  }

  /**
  * Suppression d'un commentaire  
  */ 
  public function delete()
  {
    $commentId = $this->request->getParam("id");
    $this->commentManager = new CommentManager();
    $this->commentManager->deleteComment($commentId);
    
    $this->redirection('comment', 'allComments');
  }
}
