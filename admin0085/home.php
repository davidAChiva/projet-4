<?php
session_start();

require_once 'Controller/ControllerRubricAdmin.class.php';
require_once 'Controller/ControllerManageAccountAdmin.class.php';

if (isset($_SESSION['pseudo']) AND (isset($_SESSION['password'])))
{   
    // Affiche la page en fonction de la variable option    
    if (isset($_GET['option']))
    {
        // Création des objets
        $manageEpisode = new ControllerRubricAdmin();
        $manageComment = new ControllerRubricAdmin();
        
        if ($_GET['option'] === 'newEpisode')
        {
            // Affiche la page pour creer un nouvel épisode
            $manageEpisode->displayNewEpisode();
            // Ajouter un nouvel épisode
            if ((isset($_POST['titleNewEpisode'])) AND (isset($_POST['contentNewEpisode'])))
            {
                $manageEpisode->newEpisode(($_POST['titleNewEpisode']), ($_POST['contentNewEpisode']));
                header('Location: home.php?option=newEpisode');
            }
        }
        
        else if ($_GET['option'] === 'modifyEpisode' AND (!isset($_GET['id'])))
            {
                $manageEpisode->displayModifyEpisode();
            }
        if ($_GET['option'] === 'modifyEpisode' AND (isset($_GET['id'])))
            {
                // Modifie un épisode
                if ((isset($_POST['titleEditEpisode'])) AND (isset($_POST['contentEditEpisode'])) AND (isset($_POST['idEditEpisode'])))
                {
                    $manageEpisode->modifyEpisode($_POST['idEditEpisode'],$_POST['titleEditEpisode'],$_POST['contentEditEpisode']);
                }
                $manageEpisode->displayEpisodeToModify();
            }
        else if ($_GET['option'] === 'manageComments' AND (!isset($_GET['idEpisode'])))
        {
            $manageComment->getEpisodes();
        }
        if ($_GET['option'] === 'manageComments' AND isset($_GET['idEpisode']))
        {
            // Modification du commentaire
            if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'modify' AND (isset($_GET['idComment'])))
            {
                $manageComment->modifyComment($_POST['idComment'],$_POST['authorComment'],$_POST['contentComment']);
            }
            // Suppression du commentaire
            if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'delete' AND (isset($_GET['idComment'])))
            {
                $manageComment->deleteComment($_GET['idComment']); 
            }
            $manageComment->getComments($_GET['idEpisode']);        
        }
    }
    else if (isset($_GET['manageAccount']))
    {
        $getManageAccountAdmin = new ControllerManageAccountAdmin($_GET['manageAccount']);
        $getManageAccountAdmin->displayManageAccount();
        
    }
    else
    {
        $homeAdmin = new ControllerRubricAdmin();
        $homeAdmin->displayHome();
    }
}
else
{
    header('Location:index.php');
}

