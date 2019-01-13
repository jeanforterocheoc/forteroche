<?php

class AdminController extends Controller
{
    private $adminManager;

    // Affiche l'ensemble des épisodes /admin/allEpisode
    public function allEpisode()
    {
        $this->adminManager = new AdminManager();
        $episodeAll = $this->adminManager->getEpisodeAll();

        $this->render('EpisodeAll', array('posts' => $episodeAll));
    }

    // Rediger un nouvel épisode
    public function newEpisode()
    {
        // print_r($this->request);
        $title = $this->request->getParamByDefault('title');
        $content = $this->request->getParamByDefault("content");

        if($title && $content)
        {
            $this->adminManager = new AdminManager();
            $this->adminManager->addEpisode($title, $content);
        }
        
        $this->render('NewEpisode', array('title' => $title, 'content' => $content));
    } 

}