<?php
require 'Controller/ControllerEpisode.class.php';

$setComment = new ControllerEpisode();
$setComment->newComment(htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']), htmlspecialchars($_GET['comment']));
header('Location: index.php?episode=' . $_GET["comment"]);
// !!!!!!!!!!!!!!rajouter un controle pour le post comment