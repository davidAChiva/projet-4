<?php

require_once 'Model/Episode.class.php';
require_once 'Model/Comment.class.php';

class ControllerFrontOffice
{
    private $episode;
    private $comment;
    
    public function __construct()
    {
        $this->episode = new Episode;
        $this->comment = new Comment;
    }
    
    // Affiche les éléments de la page d'accueil
    public function home()
    {
       $episodes = $this->episode->getEpisodesAsc();
       $lastEpisodes = $this->episode->getLastEpisodes();
       $lastComments = $this->comment->getLastComments();
       require "View/ViewHome.class.php";
    }
    // Affiche le contenu entier d'un seul épisode, ses commentaires et gére l'ajout d'un commentaire
    public function episode($idEpisode)
    {
        $episode = $this->episode->getEpisode($idEpisode);
        $comments = $this->comment->getComments($idEpisode);
        // valeur par défault 
        $errorMessage = null;
        $valueAuthor = null;
        $valueComment = null;
        
        if (isset($_POST['author']) AND isset($_POST['comment']))
        {
            if (preg_match('#[a-zA-Z0-9]{3,15}#',$_POST['author']) AND preg_match('#[a-zA-Z0-9 ]{10,200}#',$_POST['comment']))
            {
                $this->comment->setComment(htmlspecialchars($_POST['author']), nl2br(strip_tags($_POST['comment'])), $idEpisode); 
                header('Location: index.php?action=episode&id=' . $idEpisode);
                exit;
            }
            else if (!preg_match('#[a-zA-Z0-9]{3,15}#',$_POST['author']))
            {
                $valueAuthor = $_POST['author'];
                $valueComment = $_POST['comment'];
                $errorMessage = 'Le pseudo doit contenir entre 3 et 15 caractères.';
            }
            else if (!preg_match('#[a-zA-Z0-9 ]{10,200}#',$_POST['comment']))
            {
                $valueAuthor = $_POST['author'];
                $valueComment = $_POST['comment'];
                $errorMessage = 'Le commentaire doit contenir au moins 10 caractères.';    
            }
            
        }
        require_once 'View/ViewEpisode.class.php';
    }
    
    // Affiche les mentions légales
    public function mentions()
    {
        require_once 'View/ViewMentions.class.php';
    }
    // Affiche les informations de l'auteur
    public function author()
    {
        require_once 'View/ViewAuthor.class.php';
    }
    // Affiche la page d'erreur
    public function error($errorMsg)
    {
        $errorMessage = $errorMsg;
        require_once 'View/ViewError404.php';
    }
}