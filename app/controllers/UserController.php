<?php
class UserController extends Controller
{
    private $userManager;

    // Page home de l'administration
    public function userAdmin()
    {
        // var_dump($_SESSION);
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

    // Demande de réinitialisation du mot de passe
    public function newPass()
    {
        $recup_code = "";

        $this->render('newPass', array('recup_code'=>$recup_code));
    }

    public function recuperation()
    {
        if (isset($_POST['recup_submit'])){
            if (isset($_POST['recup_mail']) && !empty($_POST['recup_mail'])) {
                $recup_mail = htmlspecialchars($_POST['recup_mail']);
                if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
                    $this->userManager = new UserManager;
                    $mailExist = $this->userManager->mailExist($recup_mail);
                    if($mailExist){
                        $this->request->getSession()->setAttribut("recup_mail", $recup_mail);
                        // var_dump($_SESSION);
                        $recup_code = "";
                        for ($i=0; $i < 8; $i++) { 
                            $recup_code .=mt_rand(0,9);
                        }
                        $this->request->getSession()->setAttribut("recup_code", $recup_code);
                        // var_dump($_SESSION);
                        $email_recup_exist = $this->userManager->emailRecupExist($recup_mail);
                        if($email_recup_exist == 1){
                            $recup_insert = $this->userManager->recupUpdate($recup_code, $recup_mail);
                        }else {
                            $recup_insert = $this->userManager->recupInsert($recup_mail, $recup_code);
                        } 
                        $sendmail = $this->userManager->sendMail($recup_code);
                    } else {
                        $this->messages = new Messages;
                        $this->messages->setMsg('Adresse mail inexistante !', 'error');
                    }
                }else {
                    $this->messages = new Messages;
                    $this->messages->setMsg('Adresse mail invalide !', 'error');
                }
            }else {
                $this->messages = new Messages;
                $this->messages->setMsg('Veuillez entrer votre adresse mail !', 'error');
            }
            $this->render('recuperation'); 
        }
    }
}