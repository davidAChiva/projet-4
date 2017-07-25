<?php
$title = $episode['titre'] . " | Billet simple pour l'alaska" ;
ob_start();
?>
<article>
    <h3><?= $episode['titre'] . " Date : " . $episode['date_creation'] ?></h3>
    <p><?= $episode['contenu'] ?></p>   
</article>
<div>
    <h4>Commentaires</h4>
    <?php foreach ($comments as $comment): ?>
    <p> <?= $comment['author'] . ' ' . $comment['date_comment'] ?></p>
    <p class='commentContent'> <?= $comment['content'] ?></p>
    <?php endforeach; ?>
</div>
<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
