<?php
require_once '../Model/Admin.class.php';
require_once '../Model/Comment.class.php';
require_once '../Model/Episode.class.php';


class ControllerOptionAdmin
{
    private $getOption;
    private $setEpisode;
    private $getEpisodes;
    private $getEpisode;
    private $modifyEpisode;
    private $getComments;
    private $deleteComment;
    private $modifyComment;
    
    public function __construct ($option)
    {
        $this->getOption = $option;
        $this->setEpisode = new Episode;
        $this->getEpisodes = new Episode;
        $this->getEpisode = new Episode;
        $this->modifyEpisode = new Episode;
        $this->getComments = new Comment;
        $this->deleteComment = new Comment;
        $this->modifyComment = new Comment;
    }
    
    // Affiche la page demandée
    public function displayOption ()
    {
        // Déconnecte le compte et supprimer la session
        if ($this->getOption === 'deconnexion')
        {
            session_destroy();
            header('location:index.php');
        }
        if ($this->getOption === 'newEpisode')
        {
            require_once 'View/ViewCreateEpisode.php';
            
            // Ajouter un nouvel épisode
            if ((isset($_POST['titleNewEpisode'])) AND (isset($_POST['contentNewEpisode'])))
                {
                $this->newEpisode(htmlspecialchars($_POST['titleNewEpisode']), htmlspecialchars($_POST['contentNewEpisode']));
                header('Location: home.php?option=newEpisode');
                }
        }
        
        else if ($this->getOption === 'modifyEpisode')
        {
            $episodes=$this->getEpisodes->getEpisodes();
            
            if (!isset($_GET['id']))
            {
                $idEpisode = '';
                $titleEpisode = '';
                $contentEpisode = '';
            }
            
            if (isset($_GET['id']))
            {
                $episode=$this->getEpisode->getEpisode($_GET['id']);
                $idEpisode= $episode['id'];
                $titleEpisode = $episode['titre'];
                $contentEpisode = $episode['contenu'];
                
                // Modifie un épisode
                if ((isset($_POST['titleEditEpisode'])) AND (isset($_POST['contentEditEpisode'])) AND (isset($_POST['idEditEpisode'])))
                {
                    $this->modifyEpisode($_POST['idEditEpisode'],$_POST['titleEditEpisode'],$_POST['contentEditEpisode']);
                    header('Location: home.php?option=modifyEpisode');
                }
            }
            require 'View/ViewModifyEpisode.php';
        }
        else if ($this->getOption === 'manageComments')
        {
            $episodes=$this->getEpisodes->getEpisodes();
            
            if (!isset($_GET['idEpisode']))
            {
                $comments = $this->getComments->getComments(null);
            }
            
            if (isset($_GET['idEpisode']))
            {
                $comments = $this->getComments->getComments($_GET['idEpisode']);
                
                // Suppression du commentaire
                if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'delete' AND (isset($_GET['idComment'])))
                {
                    $this->deleteComment($_GET['idComment']);
                    header('location:home.php?option=manageComments&idEpisode=' . $_GET['idEpisode']);
                }
                
                // Modification du commentaire
                if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'modify' AND (isset($_GET['idComment'])))
                {
                    $this->modifyComment($_POST['idComment'],$_POST['authorComment'],$_POST['contentComment']);
                    header('location:home.php?option=manageComments&idEpisode=' . $_GET['idEpisode']);
                }
            }
            require_once 'View/ViewManageComments.php';
        }
        require_once'View/templateAdmin.php';
    }
    
    // Creer le nouvel épisode dans la base de donnée
    public function newEpisode($title, $content)
    {
        $this->setEpisode->setEpisode($title,$content);
    }
    
    // modifie l'épisode
    public function modifyEpisode($id,$title,$content)
    {
        $this->modifyEpisode->modifyEpisode($id,$title,$content);    
    }
    
    // Supprime un commentaire
    public function deleteComment($idEpisode)
    {
        $this->deleteComment->deleteComment($idEpisode);
    }
    
    // Modération du commentaire
    public function modifyComment($idComment,$authorComment,$contentComment)
    {
        $this->modifyComment->modifyComment($idComment,$authorComment,$contentComment);
    }
}