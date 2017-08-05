<?php
$title = 'Modifier un épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<h3>Sélectionnez l'épisode à modifier</h3>

<?php foreach($episodes as $episode): ?>

<div class='blockEpisode'>
    <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
    <a href='<?= 'home.php?option=modifyEpisode?id=' . $episode["id"] ?>'>Modifier cette épisode</a>
</div>

<?php endforeach; ?>

<?php
$sectionContent = ob_get_clean();
require_once ('View/templateAdmin.php');
?>