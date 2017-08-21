<?php 
$title='Gerer son compte | Billet simple pour l\'Alaska';

ob_start();
?>
<h3>MODIFIER LE PSEUDO</h3>
<form method='post' action='home.php?manageAccount=modify&pseudo=modify'>
    <label for='oldPseudo'>PSEUDO ACTUEL</label>
    <input type='text' id='oldPseudo' name='oldPseudo'value='<?= $_SESSION['pseudo'] ?>' required /> <br />
    <label for='newPseudo'>SAISSISEZ LE NOUVEAU PSEUDO</label>
    <input type='text' id='newPseudo' name='newPseudo' required /> <br />
    <input type='submit' value='Modifier le pseudo' />
</form>
<h3>MODIFIER LE MOT DE PASSE</h3>
<form method='post' action='home.php?manageAccount=modify&password=modify'>
    <label for='oldPassword'>SAISISSEZ VOTRE ANCIEN MOT DE PASSE</label>
    <input type='text' id='oldPassword' name='oldPassword' required /> <br />
    <label for='newPassword'>SAISISSEZ VOTRE NOUVEAU MOT DE PASSE</label>
    <input type='password' id='oldPassword' name='oldPassword' required/> <br />
    <label for='retypePassword'>RESAISISSEZ VOTRE NOUVEAU MOT DE PASSE</label>
    <input type='password' id='retypePassword' name='retypePassword' required />
</form>
<?php 
$sectionContent=ob_get_clean();
?>