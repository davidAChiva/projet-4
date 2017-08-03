<?php
require_once 'Controller/ControllerOptionAdmin.class.php';
$setEpisode = new ControllerOptionAdmin;
$setEpisode->newEpisode(htmlspecialchars($_POST['titleNewEpisode']), htmlspecialchars($_POST['contentNewEpisode']));
header('Location: home.php?option=newEpisode');