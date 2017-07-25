<?php

require_once "Model/Episode.class.php";

class ControllerHome
{
    private $episode;
    
    public function __construct()
    {
        $this->episode = new Episode();
    }

    public function getHome()
    {
       $episodes = $this->episode->getEpisodes();
       require "View/ViewHome.class.php";
    }

}