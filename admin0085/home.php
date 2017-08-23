<?php
session_start();

require_once 'Controller/ControllerRubricAdmin.class.php';
require_once 'Controller/ControllerAccountAdmin.class.php';

if (isset($_SESSION['pseudo']) AND (isset($_SESSION['password'])))
{   
    // Affiche la page en fonction de la variable option    
    if (isset($_GET['rubric']))
    {
        $ctrlRubric = new ControllerRubricAdmin();
        
        if ($_GET['rubric'] === 'newEpisode')
        {
            // Affiche la page pour creer un nouvel épisode
            $ctrlRubric->newEpisode();
        }
        
        else if ($_GET['rubric'] === 'modifyEpisode' AND (!isset($_GET['id'])))
            {
                $ctrlRubric->displayModifyEpisode();
            }
        
        if ($_GET['rubric'] === 'modifyEpisode' AND (isset($_GET['id'])))
            {
                $ctrlRubric->modifyEpisode();
            }
        
        else if ($_GET['rubric'] === 'manageComments' AND (!isset($_GET['idEpisode'])))
        {
            $ctrlRubric->getEpisodes();
        }
        
        if ($_GET['rubric'] === 'manageComments' AND isset($_GET['idEpisode']))
        {
            // Modification du commentaire
            if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'modify' AND (isset($_GET['idComment'])))
            {
                $ctrlRubric->modifyComment($_POST['idComment'],$_POST['authorComment'],$_POST['contentComment']);
            }
            // Suppression du commentaire
            if (isset($_GET['typeManage']) AND $_GET['typeManage'] === 'delete' AND (isset($_GET['idComment'])))
            {
                $ctrlRubric->deleteComment($_GET['idComment']); 
            }
            $ctrlRubric->getComments($_GET['idEpisode']);        
        }
    }
    else if (isset($_GET['manageAccount']))
    {
        // Création de l'objet
        $ctrlAccount = new ControllerAccountAdmin();
        
        if ($_GET['manageAccount'] === 'deconnexion')
        {
            $ctrlAccount->deconnexion();    
        }
        
        else if ($_GET['manageAccount'] === 'modifyInformations')
        {
            $ctrlAccount->manageAccount();
        }          
    }
    else
    {
        $ctrlRubric = new ControllerRubricAdmin();
        $ctrlRubric->displayHome();
    }
}
else
{
    header('Location:index.php');
}

