<?php
$title = 'Creer un nouveau épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<h3>Nouveau épisode</h3>
<form method='post' action='home.php?option=setEpisode'>
    <label for='titleNewEpisode'>TITRE DE L'EPISODE</label>
    <input type='text' id='titleNewEpisode' name='titleNewEpisode' required /> <br />
    <label for='contentNewEpisode'>CONTENU DE L'EPISODE</label>
    <textarea id='contentNewEpisode' name='contentNewEpisode'></textarea>
    <input type='submit' value='Creer le nouveau épisode' />
</form>
<?php
$sectionContent = ob_get_clean();
require_once ('View/templateAdmin.php');
?>