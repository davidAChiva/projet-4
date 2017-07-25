<?php

require_once 'Model/Episode.class.php';

class ControllerEpisode
{
    private $episode;
    
    public function __construct()
    {
        $this->episode = new Episode();
    }
    
    // Affiche le contenu entier d'un seul épisode
    public function episode($idEpisode)
    {
        $episode = $this->episode->getEpisode($idEpisode);
        require_once 'View/ViewEpisode.class.php';
    }
}