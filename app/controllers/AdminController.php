<?php

class AdminController extends Controller
{
    private $adminManager;

    // Affiche l'ensemble des épisodes
    public function allEpisode()
    {
        $this->adminManager = new AdminManager();
        $episodeAll = $this->adminManager->getEpisodeAll();

        $this->render('EpisodeAll', array('posts' => $episodeAll));
    }

    // Rediger un nouvel épisode
    public function newEpisode()
    {
        $this->adminManager = new AdminManager();
    } 

}