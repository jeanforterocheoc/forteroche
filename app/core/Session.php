<?php

class Session
{
    /**
     * Création d'une session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Destruction d'une session
     */
    public function destroy()
    {
        session_destroy();
    }

}