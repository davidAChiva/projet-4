<?php

$title = $episode['titre'] . " | Billet simple pour l'Alaska" ;
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
</div>

<?php endforeach; ?>

<form  method='post' action='comment.php?comment=<?= $episode['id'] ?>'>
    <input type='text' id='author' name='author' placeholder='Votre pseudo' required /> <br />
    <textarea id='comment' name='comment' rows='5' placeholder='Votre commentaire' required>
    </textarea> <br />
    <input type='submit' value='Commenter' />
</form>


<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
