<?php
class UsersController extends Controller
{
    /**
    * Login
    */
    public function login()
    {
        $user = $this->usersManager = new UsersManager();
        $this->render('Auth', array('login' => $user));    
    }

    /**
    * Logout
    */
    public function logout()
    {
        $this->usersManager = new UsersManager();

    }

}