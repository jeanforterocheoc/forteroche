<?php
class UserController extends Controller
{
    private $userManager;

    // Page home de l'administration
    public function userAdmin()
    {
        $this->render('Admin');
    }

    // Création du profil utilisateur
    public function createUser()
    {
        if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
            $this->userManager = new UserManager;
            $user = $this->userManager->newUser(
                    $this->request->getParam("username"),
                    $this->request->getParam("password"),
                    $this->request->getParam("email")
                    );
        }
        $this->render('createUser');
    }
}