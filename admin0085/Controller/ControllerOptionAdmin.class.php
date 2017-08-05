<?php

require_once 'Model/OptionAdmin.class.php';

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
            require_once 'View/ViewModifyEpisode.php';
        }
    }
    
    // Creer le nouvel épisode dans la base de donnée
    public function newEpisode($title, $content)
    {
        $this->setEpisode->setEpisode($title,$content);
    }
    
    
}