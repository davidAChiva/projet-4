<?php

require 'Model/OptionAdmin.class.php';

class ControllerOptionAdmin
{
    private $getOption;
    private $setEpisode;
    private $getEpisodes;
    
    public function __construct ($option)
    {
        $this->getOption = $option;
        $this->setEpisode = new OptionAdmin;
        $this->getEpisodes = new OptionAdmin;
        $this->getEpisode = new OptionAdmin;
        $this->modifyEpisode = new OptionAdmin;
        $this->getComments = new OptionAdmin;
    }
    
    // Affiche la page demandée
    public function displayOption ()
    {
        if ($this->getOption === 'newEpisode')
        {
            require_once 'View/ViewCreateEpisode.php';
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
            }
            require 'View/ViewModifyEpisode.php';
        }
        else if ($this->getOption === 'manageComments')
        {
            $episodes=$this->getEpisodes->getEpisodes();
            
            if (!isset($_GET['idEpisode']))
            {
                $comments= $this->getComments->getComments(null);
            }
            
            if (isset($_GET['idEpisode']))
            {
                $comments = $this->getComments->getComments($_GET['idEpisode']);
            }
            
            require_once 'View/ViewManageComments.php';
        }
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
    
    
}