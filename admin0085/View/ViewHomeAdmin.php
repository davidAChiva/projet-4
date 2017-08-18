<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<div id='linkOption'>
    <a href='home.php?rubric=newEpisode'>CREER UN NOUVEL EPISODE</a>
    <a href='home.php?rubric=modifyEpisode'>MODIFIER UN EPISODE</a>
    <a href='home.php?rubric=manageComments'>GERER LES COMMENTAIRES</a>
</div>
<?php
$sectionContent = ob_get_clean();
?>