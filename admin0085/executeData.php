<?php
require_once 'Controller/ControllerOptionAdmin.class.php';

if ((isset($_POST['titleNewEpisode'])) AND (isset($_POST['contentNewEpisode'])))
{
$setEpisode = new ControllerOptionAdmin(null);
$setEpisode->newEpisode(htmlspecialchars($_POST['titleNewEpisode']), htmlspecialchars($_POST['contentNewEpisode']));
header('Location: home.php?option=newEpisode');
}

if ((isset($_POST['titleEditEpisode'])) AND (isset($_POST['contentEditEpisode'])) AND (isset($_POST['idEditEpisode'])))
{
    $modifyEpisode = new ControllerOptionAdmin(null);
    $modifyEpisode->modifyEpisode($_POST['idEditEpisode'],$_POST['titleEditEpisode'],$_POST['contentEditEpisode']);
    header('Location: home.php');
}