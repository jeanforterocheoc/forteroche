<?php

require_once ('Autoloader.php');
Autoloader::register();

class Router {

    private $_ctrl;
    private $_view;

    // public function routeReq()
    // {
    //     try
    //     {
    //         $url = [''];

    //         if(isset($_GET['url']))
    //         {
    //             $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
    //             // print_r($url);
                
    //             // $controller = ucfirst(strlower($url[0]));
    //             // $controllerClass = "Controller".$controller;
    //             $controller = ucfirst(strtolower($url[0]));
    //             $controllerClass = $controller."Controller";
    //             $controllerFile = "controllers/".$controllerClass.".php";
                
    //             if(file_exists($controllerFile))
    //             {
    //                 require_once($controllerFile);
    //                 $this->_ctrl = new $controllerClass($url);
    //             }
    //
    //             else
    //             {
    //                 throw new Exception('Page introuvable');
    //             }
    //         }
    //         else 
    //         {
    //             require_once('controllers/HomeController.php');
    //             $this->_ctrl = new HomeController($url);
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $errorMsg = $e->getMessage();
    //         require_once('views/viewError.php');
    //     }
    // }
    public function routeReq() 
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