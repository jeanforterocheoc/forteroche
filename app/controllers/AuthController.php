<?php
class AuthController extends Controller
{
    /**
    * Login
    */
    public function login()
    { 
        $this->render('Auth', array('login'));
    }

    /**
    * Logout
    */
    public function logout()
    {
        
    }
}