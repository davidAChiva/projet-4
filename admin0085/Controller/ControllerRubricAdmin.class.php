<?php
require_once '../Model/Admin.class.php';
require_once '../Model/Comment.class.php';
require_once '../DAO/EpisodeDAO.class.php';
    
class ControllerRubricAdmin
{
    private $episode;
    private $comment;
    
    public function __construct ()
    {
        $this->episode = new EpisodeDAO;
        $this->comment = new Comment;
    }
    
    // Affiche la page d'accueil
    public function home()
    {
       $lastEpisode = $this->episode->getlastEpisode();
       require "view/viewHomeAdmin.php";
       require_once'view/templateAdmin.php';
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
        require_once 'view/viewCreateEpisode.php';
        require_once 'view/templateAdmin.php';
    }
    
    // Affiche la page pour gérer les épisodes
    public function manageEpisodes()
    {
        $episodes = $this->episode->getEpisodesDesc();
        require_once 'view/viewManageEpisodes.php';
        require_once 'view/templateAdmin.php';
    }
    
    // Affiche l'épisode à modifié et gére la modification
    public function modifyEpisode()
    {
        // Modifie un épisode
        if ((isset($_POST['titleEditEpisode'])) AND (isset($_POST['contentEditEpisode'])) AND (isset($_POST['idEditEpisode'])))
        {
            $this->episode->modifyEpisode($_POST['idEditEpisode'],strip_tags($_POST['titleEditEpisode']),$_POST['contentEditEpisode']);
            $message = 'L\'épisode a bien été modifié';
        }
        
        $episode = $this->episode->getEpisode($_GET['id']);

        require_once 'view/viewModifyEpisode.php';
        require_once 'view/templateAdmin.php';
    }
    public function deleteEpisode($id)
    {
        $this->episode->deleteEpisode($id);
        $this->comment->deleteCommentsEpisode($id);
        header('Location: home.php?action=manageEpisode');
        exit;
    }
    
    // Gére l'affichage des commentaires
    public function manageComments()
    {
        if (isset($_POST['idEpisodeGetComments']) AND $_POST['idEpisodeGetComments'] !== 'all')
        {
            $idEpisode = $_POST['idEpisodeGetComments'];
            $comments = $this->comment->getComments($idEpisode);          
        }
        else
        {
            $comments = $this->comment->getAllcomments();    
        }
        $episodes = $this->episode->getEpisodesAsc();
        require_once 'view/viewManageComments.php';
        require_once 'view/templateAdmin.php';
        
    } 
    
    // Supprime un commentaire
    public function deleteComment($idEpisode)
    {
        $this->comment->deleteComment($idEpisode);
        header('Location:home.php?action=manageComments&idEpisode=' . $_GET['idEpisode']);
        exit;
    }
    
    // Modération du commentaire
    public function modifyComment($idComment)
    {
        if (isset($_POST['idComment']) AND isset($_POST['authorComment']) AND isset($_POST['contentComment']))
        {
            $this->comment->modifyComment($idComment,strip_tags($_POST['authorComment']),nl2br(strip_tags($_POST['contentComment'])));
            $message = 'Le commentaire a bien été modifié';
        }
        
        $comment = $this->comment->getComment($idComment);
        $comment['content'] = strip_tags($comment['content']);
        require_once 'view/viewModifyComment.php';
        require_once 'view/templateAdmin.php';
    }
}