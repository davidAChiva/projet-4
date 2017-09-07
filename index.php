<?php
require 'Controller/ControllerFront.class.php';

$ctrlFrontOffice = new ControllerFrontOffice;

if (isset($_GET['episode']))
{
    $idEpisode = intval($_GET['episode']);
    
    if ($idEpisode != 0)
    {
        $ctrlFrontOffice->episode($idEpisode);
    }
}
else if (isset($_GET['information']))
{
    if ($_GET['information'] === 'mentions')
    {
        $ctrlFrontOffice->mentions();    
    }
}
else 
{
    $ctrlFrontOffice->home();
}



