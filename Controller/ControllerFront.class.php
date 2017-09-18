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
       require "view/viewHome.php";
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
                // Récupére les données saisies
                $valueAuthor = $_POST['author'];
                $valueComment = $_POST['comment'];
                
                // Affiche le message d'erreur
                $errorMessage = 'Le pseudo doit contenir entre 3 et 15 caractères.';
            }
            else if (!preg_match('#[a-zA-Z0-9 ]{10,200}#',$_POST['comment']))
            {
                // Récupére les données saisies
                $valueAuthor = $_POST['author'];
                $valueComment = $_POST['comment'];
                // Affiche le message d'erreur
                $errorMessage = 'Le commentaire doit contenir au moins 10 caractères.';    
            }
            
        }
        else if (isset($_POST['signalIdComment']) AND isset($_POST['signalCommentIdEpisode']))
        {
            $idEpisode = $_POST['signalCommentIdEpisode'];
            $idComment = $_POST['signalIdComment'];
            $message = 'Bonjour Jean Forteroche,
                        Un commentaire a été signalé, pour modérer le commentaire dans le back-office : http://david-alfaro.com/parcours-dev/projet-4/admin0085/home.php?action=manageComments&idEpisode=' . $idEpisode . '&typeManage=modify&idComment=' . $idComment;
            mail('david.alfaro.chiva@gmail.com','Un commentaire a été signalé',$message);
            $confirm = 'un e-mail a été envoyé à Jean Forteroche';
        }
        require_once 'view/viewEpisode.php';
    }
    
    // Affiche les mentions légales
    public function mentions()
    {
        require_once 'view/viewMentions.php';
    }
    // Affiche les informations de l'auteur
    public function author()
    {
        require_once 'view/viewAuthor.php';
    }
    // Affiche la page d'erreur
    public function error($errorMsg)
    {
        $errorMessage = $errorMsg;
        require_once 'view/viewError404.php';
    }
}