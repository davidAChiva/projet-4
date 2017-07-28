<?php

require_once 'Model/OptionAdmin.class.php';

class ControllerOptionAdmin
{
    private $getOption;
    private $setEpisode;
    
    public function __construct ($option)
    {
        $this->getOption = $option;
        $this->setEpisode = new OptionAdmin;
    }
    
    // Affiche la page demandée
    public function displayOption ()
    {
        if ($this->getOption === 'newEpisode')
        {
            require_once 'View/ViewCreateEpisode.php';
        }
    }
    
    // Creer le nouvel épisode dans la base de donnée
    public function setEpisode($title, $content)
    {
        $this->setEpisode->setEpisode($title,$content);
    }
}