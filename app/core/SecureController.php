<?php

namespace App\Core;
use App\Models\User;

abstract class SecureController extends Controller
{
    protected $user;

    public function __construct($request)
    {
        parent::__construct($request);

        if (!$this->request->getSession()->isAttribut('user')){

            $this->redirection('Auth', 'login');

        }
        $this->user = new User(json_decode($this->request->getSession()->getAttribut('user'), true));
        // $this->user = $this->request->getSession()->getAttribut('user');  
    }
}
