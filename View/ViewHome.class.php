<?php

$title = "Accueil | Billet simple pour l'Alaska";

ob_start();
?>
<div id='blockEpisode'>
<?php foreach ($episodes as $episode): ?>
    <div class='episode'>
        <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
        <p class='contentEpisode'> <?= substr($episode['contenu'],0,150) . '...' ?></p>
        <a href='<?= 'index.php?episode=' . $episode['id'] ?>'>Voir l'épisode en entier</a>
    </div>
<?php endforeach; ?>
</div>
<div id='block2'>
    <div id='aPropos'>
    <h2>A PROPOS</h2>
        <p>
            Bienvenue sur mon blog ! <br />
            Je m'appelle Jean Forteroche et je suis écrivain. Je travaille actuellement sur mon prochain roman "Billet simple pour l'Alaska". je souhaite innover et le publier par épisode en ligne sur ce site.
            En espérant que le livre vous plaira, je vous souhaite une très bonne lecture.
            N'hésitez pas à laisser un commentaire.
        </p>
    </div>
    <div id='lastComments'>
    </div>
</div>

<?php $sectionContent = ob_get_clean(); ?>
<?php require 'View/template.php'; ?>


