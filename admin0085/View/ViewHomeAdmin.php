<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<div id='linkOption'>
    <a href='home.php?option=newEpisode'>CREER UN NOUVEL EPISODE</a>
    <a href='home.php?option=modifyEpisode'>MODIFIER UN EPISODE</a>
    <a href='home.php?option=manageComments'>GERER LES COMMENTAIRES</a>
</div>
<?php
$sectionContent = ob_get_clean();
?>