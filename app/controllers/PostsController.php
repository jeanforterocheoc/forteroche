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
use App\Services\Messages;
use App\Services\Mailer;


class PostsController extends Controller
{
  private $chapterManager;
    
  /**
  * Affiche l'ensemble des posts du blog
  */
  public function posts()
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
    // Début dans l'élément LIMIT de la requête
    $start = ($currentPage-1)*$perPage;

    $posts = $chapterManager->getAllChapters($start, $perPage);
        
    $this->render('Posts', array('posts' => $posts, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
  }

  /**
  * Affiche l'ensemble des commentaires associés à un post
  */
  public function postComment()
  {
    $chapterId = $this->request->getParam("id");

    $chapterManager = new ChapterManager();
    $commentManager = new CommentManager();

    // Pagination comments
    $nbComments = $commentManager->countComments();
    $perPage = 5;
    $nbPages = $commentManager->countPages($nbComments, $perPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
      $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
      }
    $start = ($currentPage-1)*$perPage;

    $chapter = $chapterManager->getOneChapter($chapterId);
    $comments = $commentManager->getComments($chapterId, $start, $perPage);

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

      $commentManager = new commentManager();
      $comment = $commentManager->addComment($chapterId, $author, $content);
      $this->redirection('posts', 'postComment'.$chapterId);

      $messages = new Messages;
      $messages->setMsg('Le commentaire a été ajouté !', 'success');
    } else {
        $this->redirection('posts', 'postComment'.$this->request->getParam('postId'));

        $messages = new Messages;
        $messages->setMsg('Veuillez compléter tous les champs !', 'error');
      }
  }

  /**
  * Signalement par le visiteur d'un commentaire pour modération éventuelle
  */
  public function moderateComment()
  {
    $commentManager = new commentManager();

    $id = $this->request->getParam("id");

    $comment = $commentManager->getComment($id);
    $commentManager->reportComment($id);
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
            
      $mailer = new Mailer;
      $mailer->sendMailAuthor($pseudo, $email, $messageUser);
    }
    $this->render('contactAuthor');
  }
}
