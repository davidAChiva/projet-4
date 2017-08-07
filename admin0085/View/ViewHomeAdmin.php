<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<section>
    <a href='home.php?option=newEpisode'>Créer un nouveau épisode</a>
    <a href='home.php?option=modifyEpisode'>Modifier un nouveau épisode</a>
    <a href='home.php?option=manageComments'>Gérer les commentaires</a>
</section>
<?php
$sectionContent = ob_get_clean();
require_once'templateAdmin.php';
?>