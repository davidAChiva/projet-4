<?php
$title = "Panneau Administration | Billet simple pour l'Alaska";
ob_start();
?>
<p id='helloUser'>Bienvenue <?= $_SESSION['pseudo'] ?> !</p>
<h3>Dernier épisode</h3>
<article>
    <h2><?= $lastEpisode['titre'] ?></h2>
    <p id='dateEpisodeHome'><?= $lastEpisode['date_creation'] ?></p>
    <div class='episodeContent'><?= $lastEpisode['contenu'] ?></div>   
</article>
<?php
$sectionContent = ob_get_clean();
?>