<?php

require_once 'Model/Episode.class.php';
require_once 'Model/Comment.class.php';

class ControllerHome
{
    private $episode;
    private $comment;
    
    public function __construct()
    {
        $this->episode = new Episode;
        $this->comment = new Comment;
    }
    
    // Affiche les éléments de la page d'accueil
    public function getHome()
    {
       $episodes = $this->episode->getEpisodesDesc();
       $lastComments = $this->comment->getLastComments();
       require "View/ViewHome.class.php";
    }
}