<?php
require_once '../Model/Admin.class.php';
require_once '../Model/Comment.class.php';
require_once '../Model/Episode.class.php';


class ControllerRubricAdmin
{
    private $episode;
    private $comment;
    
    public function __construct ()
    {
        $this->episode = new Episode;
        $this->comment = new Comment;
    }
    
    // Affiche la page d'accueil
    public function home()
    {
       $lastEpisode = $this->episode->getlastEpisode();
       require "View/ViewHomeAdmin.php";
       require_once'View/templateAdmin.php';
    }
    
    //Affiche la page creer épisode et gére le formulaire
    public function newEpisode()
    {
    // Ajouter un nouvel épisode
    if ((isset($_POST['titleNewEpisode'])) AND (isset($_POST['contentNewEpisode'])))
    {
        $this->episode->setEpisode((strip_tags($_POST['titleNewEpisode'])), ($_POST['contentNewEpisode']));
        header('Location: home.php');
        exit;
    }
        require_once 'View/ViewCreateEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    
    // Affiche la page modifier épisode
    public function displayModifyEpisode()
    {
        $episodes = $this->episode->getEpisodesDesc();
        $idEpisode = null;
        $titleEpisode = null;
        $contentEpisode = null;
        require_once 'View/ViewModifyEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    
    // Affiche l'épisode à modifié et gére la modification
    public function modifyEpisode()
    {
        // Modifie un épisode
        if ((isset($_POST['titleEditEpisode'])) AND (isset($_POST['contentEditEpisode'])) AND (isset($_POST['idEditEpisode'])))
        {
            $this->episode->modifyEpisode($_POST['idEditEpisode'],strip_tags($_POST['titleEditEpisode']),$_POST['contentEditEpisode']);
        }
        
        $episodes = $this->episode->getEpisodesDesc();
        $episode = $this->episode->getEpisode($_GET['id']);
        $idEpisode = $episode['id'];
        $titleEpisode = $episode['titre'];
        $contentEpisode = $episode['contenu'];

        require_once 'View/ViewModifyEpisode.php';
        require_once 'View/templateAdmin.php';
    }
    public function deleteEpisode($id)
    {
        $this->episode->deleteEpisode($id);
        $this->comment->deleteCommentsEpisode($id);
        header('Location: home.php?rubric=modifyEpisode');
        exit;
    }
    
    // Affiche tous les épisodes
    public function getEpisodes()
    {
        $episodes = $this->episode->getEpisodesAsc();
        $comments = $this->comment->getComments(null); 
        require_once 'View/ViewManageComments.php';
        require_once 'View/templateAdmin.php';
    }
    
    // Affiche les commentaires d'un épisode
    public function getComments($idEpisode)
    {
        $episodes = $this->episode->getEpisodesAsc();
        $comments = $this->comment->getComments($idEpisode);
        require_once 'View/ViewManageComments.php';
        require_once 'View/templateAdmin.php';
        
    } 
    
    // Supprime un commentaire
    public function deleteComment($idEpisode)
    {
        $this->comment->deleteComment($idEpisode);
        header('Location:home.php?rubric=manageComments&idEpisode=' . $_GET['idEpisode']);
        exit;
    }
    
    // Modération du commentaire
    public function modifyComment($idComment)
    {
        if (isset($_POST['idComment']) AND isset($_POST['authorComment']) AND isset($_POST['contentComment']))
        {
            $this->comment->modifyComment($idComment,$_POST['authorComment'],$_POST['contentComment']);    
        }
        $comment = $this->comment->getComment($idComment);
        require_once 'View/ViewmodifyComment.php';
        require_once 'View/templateAdmin.php';
    }
}