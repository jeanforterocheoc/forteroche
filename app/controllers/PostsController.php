<?php
/**
 * Cette classe gère l'ensemble des posts du blog
 * Et des commentaires laissés par les visiteurs du blog
 * Côté frontend
 */
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Manager\UserManager;
use App\Models\Manager\ChapterManager;
use App\Models\Manager\CommentManager;
use App\Models\Entity\Messages;

class PostsController extends Controller
{
  private $chapterManager;
    
  /**
  * Affiche l'ensemble des posts du blog
  */
  public function posts()
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
    // Début dans l'élément LIMIT de la requête
    $start = ($currentPage-1)*$perPage;

    $posts = $this->chapterManager->getAllChapters($start, $perPage);
        
    $this->render('Posts', array('posts' => $posts, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /**
  * Affichage de l'ensemble des commentaires associés à un post
  */
  public function postComment()
  {
    $chapterId = $this->request->getParam("id");

    $this->chapterManager = new ChapterManager();
    $this->commentManager = new CommentManager();

    // Pagination comments
    $nbComments = $this->commentManager->countComments();
    $perPage = 5;
    $nbPages = $this->commentManager->countPages($nbComments, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    $start = ($currentPage-1)*$perPage;

    $chapter = $this->chapterManager->getOneChapter($chapterId);
    $comments = $this->commentManager->getComments($chapterId, $start, $perPage);

    $this->render('Post', array('postComment' => $chapter, 'comments' => $comments, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /**
  * Permet aux visiteurs d'ajouter un commentaire
  */
  public function addComment()
  {
    if ($this->request->paramExist('author') && $this->request->paramExist('commentUser')) {
      $chapterId = htmlspecialchars($this->request->getParam('postId'), ENT_QUOTES) ;
      $author = htmlspecialchars($this->request->getParam('author'), ENT_QUOTES);
      $content = htmlspecialchars($this->request->getParam('commentUser'), ENT_QUOTES);

      $this->commentManager = new commentManager();
      $comment = $this->commentManager->addComment($chapterId, $author, $content);
      $this->redirection('Posts', 'postComment'.$chapterId);

      $this->messages = new Messages;
      $this->messages->setMsg('Le commentaire a été ajouté !', 'success');
    } else {
        $this->redirection('Posts', 'postComment'.$this->request->getParam('postId'));

        $this->messages = new Messages;
        $this->messages->setMsg('Veuillez compléter tous les champs !', 'error');
    }
  }

  /**
  * Signalement par le visiteur d'un commentaire pour modération éventuelle
  */
  public function moderateComment()
  {
    $this->commentManager = new commentManager();

    $id = $this->request->getParam("id");

    $comment = $this->commentManager->getComment($id);
    $this->commentManager->reportComment($id);
  }

  /**
  * Formulaire de contact
  */
  public function contactAuthor()
  {
    if ($this->request->paramExist('pseudo') && $this->request->paramExist('email') && $this->request->paramExist('messageUser')) {
      $pseudo = htmlspecialchars($this->request->getParam('pseudo'), ENT_QUOTES);
      $email = htmlspecialchars($this->request->getParam('email'), ENT_QUOTES);
      $messageUser = htmlspecialchars($this->request->getParam('messageUser'), ENT_QUOTES);
            
      $this->userManager = new UserManager();
      $this->userManager->sendMailAuthor($pseudo, $email, $messageUser);
    }
    $this->render('contactAuthor');
  }
}
