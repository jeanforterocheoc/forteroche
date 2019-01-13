<?php

class View 
{
    private $file;
    private $title;
    
    public function __construct($action, $controller) 
    {
        $this->file = '../app/views/' .$action.'.php';
        
        if($controller == "AdminController")
        {
            $this->template = 'templateAdmin.php';
        }
        else
        {
            $this->template = 'template.php';
        }
    }

    // Génère et affiche la vue
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
        }else{
            throw new Exception('Le fichier ' .$file. ' est introuvable.' );
        }
    }

}