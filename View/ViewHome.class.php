<?php

$title = "Accueil - Billet simple pour l'Alaska";
ob_start();
foreach ($episodes as $episode): ?>
<div>
    <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
    <p class='contentEpisode'> <?= substr($episode['contenu'],0,150) ?></p>
    <a href='<?= 'index.php?episode=' . $episode['id'] ?>'>Voir l'épisode en entier</a>
</div>
<?php endforeach; ?>
<?php $sectionContent = ob_get_clean(); ?>
<?php require 'View/template.php'; ?>


