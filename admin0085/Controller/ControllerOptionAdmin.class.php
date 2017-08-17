<?php
require_once '../Model/Admin.class.php';
require_once '../Model/Comment.class.php';
require_once '../Model/Episode.class.php';


class ControllerOptionAdmin
{
    private $episode;
    private $comment;
    
    public function __construct ()
    {
        $this->episode = new Episode;
        $this->comment = new Comment;
    }
    
    //Affiche la page creer épisode
    public function displayNewEpisode()
    {
        require_once 'View/ViewCreateEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    
    // Creer le nouvel épisode dans la base de donnée
    public function newEpisode($title, $content)
    {
        $this->episode->setEpisode($title,$content);
    }
    
    // Affiche la page modifier épisode
    public function displayModifyEpisode()
    {
        $episodes = $this->episode->getEpisodes();
        $idEpisode = null;
        $titleEpisode = null;
        $contentEpisode = null;
        require_once 'View/ViewModifyEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    
    // Affiche l'épisode à modifié
    public function displayEpisodeToModify()
    {
        $episodes = $this->episode->getEpisodes();
        $episode = $this->episode->getEpisode($_GET['id']);
        $idEpisode = $episode['id'];
        $titleEpisode = $episode['titre'];
        $contentEpisode = $episode['contenu'];
        require_once 'View/ViewModifyEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    // Affiche tous les épisodes
    public function getEpisodes()
    {
        $episodes = $this->episode->getEpisodes();
        $comments = $this->comment->getComments(null); 
        require_once 'View/ViewManageComments.php';
        require_once 'View/templateAdmin.php';
    }
    // Affiche les commentaires d'un épisode
    public function getComments($idEpisode)
    {
        $episodes = $this->episode->getEpisodes();
        $comments = $this->comment->getComments($idEpisode);
        require_once 'View/ViewManageComments.php';
        require_once 'View/templateAdmin.php';
        
    }
    // modifie l'épisode
    public function modifyEpisode($id,$title,$content)
    {
        $this->episode->modifyEpisode($id,$title,$content);
        header('Location:home.php?option=modifyEpisode&id=' . $_GET['id']);
        exit;
    }
    
    // Supprime un commentaire
    public function deleteComment($idEpisode)
    {
        $this->comment->deleteComment($idEpisode);
        header('Location:home.php?option=manageComments&idEpisode=' . $_GET['idEpisode']);
        exit;
    }
    
    // Modération du commentaire
    public function modifyComment($idComment,$authorComment,$contentComment)
    {
        $this->comment->modifyComment($idComment,$authorComment,$contentComment);
    }
}