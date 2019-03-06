<?php
namespace App\Core;

class View
{
  private $file;
  private $title;

  /** 
  * Permet d'initialiser le controller et l'action
  */ 
  public function __construct(string $action, string $controller)
  {
    $controller = str_replace('Controller', '', $controller);
    $controller = strtolower($controller). '/';

    // Sélectionne le fichier de la vue demandée dans le dossier views
    $file = strtolower($controller);
    $this->file = $file .strtolower($action).'.php';
    
    // Détermine le template approprié selon le contrôleur
    if (($controller == "chapter") |($controller == "comment")| ($controller == "user")) {
        $this->template = 'templateAdmin.php';
    } else {
        $this->template = 'template.php';
      }
  }

  /**
  * Génère et affiche la vue
  */
  public function generate($params)
  {
    // Partie spécifique de la vue
    $content = $this->generateFile($this->file, $params);

    $racineWeb = Config::get("racineWeb", "/");

    // Temlpate
    $view = $this->generateFile($this->template, array('title' => $this->title, 'content' => $content, 'racineWeb' => $racineWeb));

    echo $view;
  }

  // Genère un fichier vue et renvoie le résultat
  private function generateFile($file, $params)
  {
    $file = '../app/views/' . $file;

    if (file_exists($file)) {
      extract($params);
      ob_start();
      // Inclut le fichier vue
      require $file;

      return ob_get_clean();
    } else {
        throw new \Exception('Le fichier ' .$file. ' est introuvable.');
      }
  }
}
