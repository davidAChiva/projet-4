<?php
require 'Controller/ControllerFront.class.php';

$ctrlFrontOffice = new ControllerFrontOffice;
try
{
if (isset($_GET['episode']))
{
    $idEpisode = intval($_GET['episode']);
    
    if ($idEpisode != 0)
    {
        $ctrlFrontOffice->episode($idEpisode);
    }
    else 
    {
        throw new Exception('Aucun épisode ne correspond à l\'identifiant ' . $idEpisode);
    }
}
else if (isset($_GET['information']))
{
    if ($_GET['information'] === 'mentions')
    {
        $ctrlFrontOffice->mentions();    
    }
    else 
    {
        throw new Exception ('Cette page n\'existe pas !');
    }
}

else 
{
    $ctrlFrontOffice->home();
}
}
catch (Exception $e)
{
    $ctrlFrontOffice->error($e->getMessage());
}





