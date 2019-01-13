<?php

class View {

    private $file;
    private $title;

    public function __construct($action) 
    {
        $this->file = '../app/views/view'.$action.'.php';
    }

    // Génère et affiche la vue
    public function generate($data) 
    {
        // Partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        

        // Temlpate
        $view = $this->generateFile('../app/views/template.php', array('title' => $this->title, 'content' => $content));
        
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