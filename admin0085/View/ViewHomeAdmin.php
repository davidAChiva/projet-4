<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<section>
    <a href='home.php<?="?option=newEpisode"?>'>Créer un nouveau épisode</a>
    <a href="">Modifier un nouveau épisode</a>
</section>
<?php
$sectionContent = ob_get_clean();
require_once'templateAdmin.php';
?>