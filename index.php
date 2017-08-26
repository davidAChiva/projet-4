<?php
require 'Controller/ControllerFront.class.php';

$ctrlFront = new ControllerFront;

if (isset($_GET['episode']))
{
    $idEpisode = intval($_GET['episode']);
    
    if ($idEpisode != 0)
    {
        $ctrlFront->episode($idEpisode);
    }
}
else 
{
$ctrlFront->getHome();
}



