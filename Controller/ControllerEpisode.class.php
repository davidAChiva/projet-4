<?php

require_once 'Model/Episode.class.php';
require_once 'Model/Comment.class.php';

class ControllerEpisode
{
    private $episode;
    private $comment;
    
    public function __construct()
    {
        $this->episode = new Episode();
        $this->comment = new Comment();
    }
    
    // Affiche le contenu entier d'un seul épisode
    public function episode($idEpisode)
    {
        $episode = $this->episode->getEpisode($idEpisode);
        $comments = $this->comment->getComments($idEpisode);
        require_once 'View/ViewEpisode.class.php';
    }
}