<?php

require_once ('Autoloader.php');
Autoloader::register();


class Router {

    private $ctrl;
    private $view;

    public function routeRequest() 
    {
        try
        {
            $url = [''];

            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'post') 
                {
                    if (isset($_GET['id'])) 
                    {
                        $postId = intval($_GET['id']);
                    }    
                        if ($postId != 0) 
                        {    
                            $this->ctrl = new postController($postId);        
                        }
                        else
                        {
                            throw new Exception("Identifiant de l'épisode non valide");
                        }  
                    }
                    // if ($_GET['action'] == 'comment')
                    // {
                    //     if (isset($_GET['id'])) 
                    // {
                    //     $postId = intval($_GET['id']);
                    // }    
                    //     if ($postId != 0) 
                    //     {    
                    //         $this->ctrl = new commentController($postId);        
                    //     }
                    //     else
                    //     {
                    //         throw new Exception("Identifiant du commentaire non valide");
                    //     }  
                    // }
                    else
                    {
                        throw new Exception("Action non valide");
                    }
                }
            else
            { 
                $this->ctrl = new homeController($url);  
            }
        }
        catch(Exception $e){
            $this->error($e->getMessage());
        }
    }

    private function error($msgError)
    {
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    } 
}