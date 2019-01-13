<?php
class UserController extends Controller
{
    private $userManager;

    public function userAdmin()
    {
        $this->render('Admin');
    }
}