<?php
abstract class ControllerAdmin extends Controller
{
    // Méthode qui renvoie la vue admin
    protected function render(string $name, array $params=[])
    {
        $view = new View($name, 'templateAdmin');
        $view->generate($params);        
    }

    protected function checkSession()
    {
        if(isset($_SESSION['']));
    }
}