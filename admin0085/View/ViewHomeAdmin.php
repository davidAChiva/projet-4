<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<div>
    <ul>
                <li><a href='home.php'>ACCUEIL</a></li>
                <li>GERER MON COMPTE</li>
                <li><a href='home.php?manageAccount=deconnexion'>DECONNEXION</a></li>
    </ul>
</div>
<div id='linkOption'>
    <a href='home.php?rubric=newEpisode'>CREER UN NOUVEL EPISODE</a>
    <a href='home.php?rubric=modifyEpisode'>MODIFIER UN EPISODE</a>
    <a href='home.php?rubric=manageComments'>GERER LES COMMENTAIRES</a>
</div>
<?php
$sectionContent = ob_get_clean();
?>