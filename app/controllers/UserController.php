<?php
class UserController extends ControllerAdmin
{
    private $userManager;

    // Profil Admin  user/homeAdmin
    public function userAdmin()
    {     
        if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
            $this->userManager = new UserManager;
                
            $user = $this->userManager->getUser(
                    $this->request->getParam("username"),
                    $this->request->getParam("password")
                    );
                
            // Vérifie si utilisateur identifié dans la bdd ('username' => admin)       
            if (null != $user) {
                $_SESSION['admin'] = $user;
                $this->render('Admin', array('userAdmin' => $user));
            }else {
                echo ('Les identifiants sont incorrects.');
            }         
        }else {
            echo ('Veuillez remplir tous les champs !');
        }                
    }
    
}