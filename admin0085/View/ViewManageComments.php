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
<?php foreach($comments as $comment): ?>
    <div class='comment'>
        <p><?= $comment['author'] ?></p>
        <p><?= $comment['content'] ?></p>
        <a href='<?='home.php?option=manageComments&idEpisode=' . $_GET['idEpisode'] . '&typeManage=delete&idComment=' .  $comment['id'] ?>'>Supprimer ce commentaire</a>
        <a href='<?='home.php?option=manageComments&idEpisode=' . $_GET['idEpisode'] . '&typeManage=modify' ?>'>Modifier ce commentaire</a>
    </div>
<?php endforeach; ?>
</div>
<?php
$sectionContent = ob_get_clean();
require_once ('View/templateAdmin.php');
?>