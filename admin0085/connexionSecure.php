<?php
require 'Controller/ControllerConnexionAdmin.class.php';

$pseudoKey = htmlspecialchars($_POST['pseudoAdmin']);
$passwordKey = htmlspecialchars($_POST['passwordAdmin']);

// hashage du mot de passe envoyé
$passwordKey=hash('sha512',$passwordKey);

$connexion = new ControllerConnexionAdmin();
$checkLogin= $connexion->controlLogin($pseudoKey,$passwordKey);

// Controle si le pseudo et mot de passe saisi corresponde à la ligne de la table
if ($pseudoKey === $checkLogin['pseudonym'] AND $passwordKey === $checkLogin['password'])
{
    header('Location: home.php');
}

?>
