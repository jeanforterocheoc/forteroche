<?php
// require_once("../app/models/Messages.php");
class AuthController extends Controller
{
    /**
    * Login
    */
    public function login()
    { 
        // $error = "";
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            // $this->render('Auth', array('error'=> $error));
            $this->render('Auth');

            return; 
         }
        if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
            $this->userManager = new UserManager;
            $user = $this->userManager->getUser(
                    $this->request->getParam("username"),
                    $this->request->getParam("password")
                    );
                
            // Vérifie si utilisateur identifié dans la bdd ('username' => admin)       
            if (null != $user) {
                $_SESSION['admin'] = $user;
                $this->redirection('User', 'userAdmin');
            }else {
                // $error = 'Les identifiants sont incorrects.';
                $this->messages = new Messages;
                $this->messages->setMsg('Les identifiants sont incorrects.', 'error');
            }         
        }else {
            // $error = 'Veuillez remplir tous les champs !';
            $this->messages = new Messages;
            $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
        }            
        // $this->render('Auth', array('error'=> $error));
        $this->render('Auth');

    }

    /**
    * Logout
    */
    public function logout()
    {
        
    }
}