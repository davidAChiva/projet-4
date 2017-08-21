<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<h3>Bienvenue machin</h3>
<h3>Dernier épisode</h3>
<article>
    <h2><?= $episode['titre'] ?></h2>
    <p><?= $episode['date_creation'] ?></p>
    <div id='episodeContent'><?= $episode['contenu'] ?></div>   
</article>
<?php
$sectionContent = ob_get_clean();
?>