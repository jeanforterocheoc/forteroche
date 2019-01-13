<?php

class AuthController extends Controller
{
    private $userManager;

   
    
    /**
    * Login
    */
    public function login()
    { 
        
        
        // // $error = "";
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            // $this->render('Auth', array('error'=> $error));
            $this->render('Auth');
            return; 
         }
         if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
                $username = $this->request->getParam("username");
                $password = $this->request->getParam("password");
                 $this->userManager = new UserManager;
                 $user =$this->userManager->getUser($username);
                 if(password_verify($password, $user->getPassword())) {
                     $this->request->getSession()->setAttribut("id", $user->getId());
                     $this->request->getSession()->setAttribut("username", $user->getUsername());
                     $this->redirection('User', 'userAdmin');
                 } 
                 
         }
        

        //     // Vérifie si utilisateur identifié dans la bdd ('username' => admin)       
        //     // if (null != $user) {
        //         if (password_verify('yaya', $password))
        //         {
        //             var_dump($_SESSION['yaya']);
        //             exit;
        //             $_SESSION['yaya'] = $user;
        //             $this->redirection('User', 'userAdmin');
        //         }else {
        //             $this->messages = new Messages;
        //             $this->messages->setMsg('Pas bon.', 'error');
        //         }

        //         // $_SESSION['yaya'] = $user;
        //         // $this->redirection('User', 'userAdmin');
        //     // }else {
        //     //     // $error = 'Les identifiants sont incorrects.';
        //     //     $this->messages = new Messages;
        //     //     $this->messages->setMsg('Les identifiants sont incorrects.', 'error');
        //     // }         
        // }else {
        //     // $error = 'Veuillez remplir tous les champs !';
        //     $this->messages = new Messages;
        //     $this->messages->setMsg('Veuillez remplir tous les champs !', 'error');
        // }            
        // // $this->render('Auth', array('error'=> $error));
        // $this->render('Auth');

    }

    /**
    * Logout
    */
    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirection('Auth', 'login');
        var_dump($_SESSION);

    }
}