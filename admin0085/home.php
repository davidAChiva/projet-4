<?php
session_start();

require_once 'Controller/ControllerRubricAdmin.class.php';
require_once 'Controller/ControllerAccountAdmin.class.php';

if (isset($_SESSION['pseudo']) AND (isset($_SESSION['password'])))
{   
    // Affiche la page en fonction de l'action   
    if (isset($_GET['action']))
    {
        $ctrlRubric = new ControllerRubricAdmin();
        $ctrlAccount = new ControllerAccountAdmin();
        
        if ($_GET['action'] === 'newEpisode')
        {
            // Affiche la page pour creer un nouvel épisode
            $ctrlRubric->newEpisode();
        }
        
        else if ($_GET['action'] === 'manageEpisode')
        {  
            if (isset($_GET['id']) AND isset($_GET['typeManage']))
            {
                if ($_GET['typeManage'] === 'modify')
                {
                    // Affiche et modifie l'épisode
                    $ctrlRubric->modifyEpisode();    
                }
                else if ($_GET['typeManage'] === 'delete')
                {
                    // Supprime l'épisode
                    $ctrlRubric->deleteEpisode($_GET['id']);
                }
            }
            // Affiche tous les épisodes
            else
            {
            $ctrlRubric->manageEpisodes();
            }
        }
         
        else if ($_GET['action'] === 'manageComments')
        {   
            if (isset($_GET['idEpisode']) AND isset($_GET['typeManage']))
            {
                // Modification du commentaire
                if ($_GET['typeManage'] === 'modify')
                {
                    $ctrlRubric->modifyComment($_GET['idComment']);
                }
                else if ($_GET['typeManage'] === 'delete')
                // Suppression du commentaire
                {
                    $ctrlRubric->deleteComment($_GET['idComment']);   
                }
            }
            else
            {
            // Affiche les commentaires 
            $ctrlRubric->manageComments();
            }
        }
        
        else if ($_GET['action'] === 'manageAccount')
        {   
            if (isset($_GET['typeManage']))
            {
                if ($_GET['typeManage'] === 'deconnexion')
                {
                    $ctrlAccount->deconnexion();    
                }

                else if ($_GET['typeManage'] === 'modifyInformations')
                {
                    $ctrlAccount->modifyAccount();
                }
            }
        }

    }
    else
    {
        $ctrlRubric = new ControllerRubricAdmin();
        $ctrlRubric->home();
    }
}

else
{
    header('Location:index.php');
}

