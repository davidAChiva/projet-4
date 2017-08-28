<?php 
$title='Gerer son compte | Billet simple pour l\'Alaska';

ob_start();
?>
<h3>MODIFIER LE PSEUDO</h3>
<p>Pseudo actuel : <?= $_SESSION['pseudo'] ?></p>
<form method='post' action='home.php?manageAccount=modifyInformations'>
    <label for='newPseudo'>SAISISSEZ LE NOUVEAU PSEUDO</label>
    <input type='text' id='newPseudo' name='newPseudo' required /> <br />
    <input class='submit' type='submit' value='Modifier le pseudo' />
</form>
<h3>MODIFIER LE MOT DE PASSE</h3>
<form method='post' action='home.php?manageAccount=modifyInformations'>
    <label for='oldPassword'>SAISISSEZ VOTRE ANCIEN MOT DE PASSE</label>
    <input type='password' id='oldPassword' name='oldPassword' required /> <br />
    <label for='newPassword'>SAISISSEZ VOTRE NOUVEAU MOT DE PASSE</label>
    <input type='password' id='newPassword' name='newPassword' required/> <br />
    <label for='retypePassword'>RESAISISSEZ VOTRE NOUVEAU MOT DE PASSE</label>
    <input type='password' id='retypePassword' name='retypePassword' required /> <br />
    <input class='submit' type='submit' value='Modifier le mot de passe' />
</form>
<?php 
$sectionContent=ob_get_clean();
?>