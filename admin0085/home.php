<?php
session_start();

require_once 'Controller/ControllerHomeAdmin.class.php';
require_once 'Controller/ControllerOptionAdmin.class.php';

if (isset($_SESSION['pseudo']) AND (isset($_SESSION['password'])))
{   
    // Affiche la page en fonction de la variable option    
    if (isset($_GET['option']))
    {
        $getOptionAdmin = new ControllerOptionAdmin($_GET['option']);
        $getOptionAdmin->displayOption();

    }
    else
    {
        $getHomeAdmin = new ControllerHomeAdmin;
        $getHomeAdmin->getHomeAdmin();
    }
}
else
{
    header('location:index.php');
}

