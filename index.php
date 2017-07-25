<?php
require 'Controller/ControllerHome.class.php';
require 'Controller/ControllerEpisode.class.php';

if (isset($_GET['episode']))
{
    $idEpisode = intval($_GET['episode']);
    
    if ($idEpisode != 0)
    {
        $getEpisode = new ControllerEpisode;
        $getEpisode->episode($idEpisode);
    }
}
else 
{
$getController = new ControllerHome();
$getController->getHome();
}



