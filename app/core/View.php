<?php
namespace App\Core;

use App\Core\Controller;

class View
{
  private $file;
  private $title;

  public function __construct(string $action, string $controller)
  {
    $file = '../app/views/';

    $controller = str_replace('Controller', '', $controller);
    $controller = strtolower($controller). '/';

    $file = $file.strtolower($controller);
    
    $this->file = $file .strtolower($action).'.php';
    
    if (($controller == "chapter/") |($controller == "comment/")| ($controller == "user/")) {
        $this->template = 'templateAdmin.php';
    } else {
        $this->template = 'template.php';
      }
  }

  /**
  * Génère et affiche la vue
  */
  public function generate($data)
  {
    // Partie spécifique de la vue
    $content = $this->generateFile($this->file, $data);

    $racineWeb = Config::get("racineWeb", "/");

    // Temlpate
    $view = $this->generateFile('../app/views/'. $this->template, array('title' => $this->title, 'content' => $content, 'racineWeb' => $racineWeb));

    echo $view;
  }

  // Genère un fichier vue et renvoie le résultat produit
  private function generateFile($file, $data)
  {
    if (file_exists($file)) {
      extract($data);
      ob_start();
      // Inclut le fichier vue
      require $file;

      return ob_get_clean();
    } else {
        throw new \Exception('Le fichier ' .$file. ' est introuvable.');
      }
  }
}
