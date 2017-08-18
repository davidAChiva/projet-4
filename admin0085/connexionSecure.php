<?php session_start();

require 'Controller/ControllerAccountAdmin.class.php';

$pseudoKey = htmlspecialchars($_POST['pseudoAdmin']);
$passwordKey = htmlspecialchars($_POST['passwordAdmin']);

// hashage du mot de passe envoyé
$passwordKey=hash('sha512',$passwordKey);

$connexion = new ControllerAccountAdmin();
$checkLogin= $connexion->controlLogin($pseudoKey,$passwordKey);

// Controle si le pseudo et mot de passe saisi corresponde à la ligne de la table
if ($pseudoKey === $checkLogin['pseudonym'] AND $passwordKey === $checkLogin['password'])
{
    // Enregistrement des informations de connexion dans la session
    $_SESSION['pseudo'] = $pseudoKey;
    $_SESSION['password'] = $passwordKey;
    header('Location: home.php');
}

?>
