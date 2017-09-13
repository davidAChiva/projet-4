<?php
$title = 'Creer un nouveau épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<h3>Nouveau épisode</h3>
<form method='post' action='home.php?rubric=newEpisode'>
    <label for='titleNewEpisode'>TITRE DE L'EPISODE</label>
    <input type='text' id='titleNewEpisode' name='titleNewEpisode' required /> <br />
    <label for='contentNewEpisode'>CONTENU DE L'EPISODE</label>
    <textarea id='contentNewEpisode' name='contentNewEpisode' rows='30'></textarea> <br />
    <input class='submit' type='submit' value='Creer le nouveau épisode' />
</form>
<?php
$sectionContent = ob_get_clean();
?>