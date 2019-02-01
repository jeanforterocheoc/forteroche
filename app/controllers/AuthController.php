<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\UserManager;
use App\Models\Messages;
/**
 * La classe AuthController permet de vérifier l'identité de l'utilisateur
 * et de mettre l'objet user en session si toutes les garanties sont réunies
 */
class AuthController extends Controller
{
    private $userManager;

    /**
    * Login
    */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->render('Auth');
            return;
        }
        if ($this->request->paramExist('username') && $this->request->paramExist('password')) {
            $username = htmlspecialchars($this->request->getParam("username"), ENT_QUOTES);
            $password = htmlspecialchars($this->request->getParam("password"), ENT_QUOTES);

            $this->userManager = new UserManager;
            $user = $this->userManager->getUser($username);
            if (null != $user) {
                if (password_verify($password, $user->getPassword())) {
                    $this->request->getSession()->setAttribut('user', json_encode($user->toArray()));
                    $this->redirection('User', 'userAdmin');
                } else {
                    $this->messages = new Messages;
                    $this->messages->setMsg('Erreur d\'identifiants !', 'error');
                }
            } else {
                $this->messages = new Messages;
                $this->messages->setMsg('Les identifiants sont incorrects !', 'error');
            }
        } else {
            $this->messages = new Messages;
            $this->messages->setMsg('Veuillez compléter tous les champs !', 'error');
        }
        $this->render('Auth');
    }

    /**
    * Logout
    */
    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirection('Auth', 'login');
    }
}
