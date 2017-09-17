<?php
require 'Controller/ControllerFront.class.php';

$ctrlFrontOffice = new ControllerFrontOffice;
try
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] === 'episode')
        {
            if (isset($_GET['id']))
            {
                $idEpisode = intval($_GET['id']);
                
                if ($idEpisode != 0)
                {
                    $ctrlFrontOffice->episode($idEpisode);
                }
                else
                {
                    throw new Exception('L\'identifiant ' . $idEpisode . ' n\'éxiste pas');    
                }
            }
            else
            {
                throw new Exception('Aucun identifiant n\'a été transmis');    
            }
        }

        else if ($_GET['action'] === 'mentions')
        {
            $ctrlFrontOffice->mentions();    
        }
        else if ($_GET['action'] === 'author')
        {
            $ctrlFrontOffice->author();
        }
        else
        {
             throw new Exception('Cette action n\'éxiste pas');   
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





