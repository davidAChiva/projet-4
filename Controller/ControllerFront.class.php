<?php

require_once 'Model/Episode.class.php';
require_once 'Model/Comment.class.php';

class ControllerFront
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
    // Affiche le contenu entier d'un seul épisode, ses commentaires et gére l'ajout d'un commentaire
    public function episode($idEpisode)
    {
        $episode = $this->episode->getEpisode($idEpisode);
        $comments = $this->comment->getComments($idEpisode);
        if (isset($_POST['author']) AND isset($_POST['comment']))
        {
            $this->comment->setComment(htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']), $idEpisode); 
            header('Location: index.php?episode=' . $idEpisode);
            exit;
        }
        require_once 'View/ViewEpisode.class.php';
    }
}