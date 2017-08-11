<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
<h3>Sélectionnez l'épisode des commentaires à modifier</h3>

<?php foreach($episodes as $episode): ?>

<div class='blockEpisode'>
    <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
    <a href='<?= 'home.php?option=manageComments&idEpisode=' . $episode["id"] ?>'>Gérer les commentaires de cette épisode</a>
</div>

<?php endforeach; ?>

<div class='blockComments'>
    <h2> Commentaires de l'épisode</h2>
    <p><?= $commentAuthor ?></p>
</div>
<?php
$sectionContent = ob_get_clean();
require_once ('View/templateAdmin.php');
?>