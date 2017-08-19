<?php

$title = $episode['titre'] . " | Billet simple pour l'Alaska" ;
ob_start();

?>

<article>
    <h2><?= $episode['titre'] ?></h2>
    <p><?= $episode['date_creation'] ?></p>
    <div id='episodeContent'><?= $episode['contenu'] ?></div>   
</article>
    <h3>Commentaires de l'épisode</h3>
    <?php foreach ($comments as $comment): ?>
<div class='comment'>
    <p class='pseudoAuthor'> <?= $comment['author'] ?></p> 
    <p class='dateComment'> <?= $comment['date_comment'] ?></p>
    <p class='commentContent'> <?= $comment['content'] ?></p>
</div>

<?php endforeach; ?>

<div id='formComment'>
    <form  method='post' action='comment.php?comment=<?= $episode['id'] ?>'>
        <label for='author'>Votre pseudo</label> <br />
        <input type='text' id='formAuthorComment' name='author' required /> <br />
        <label for='comment'>Votre commentaire</label> <br />
        <textarea id='comment' name='comment' rows='10' cols='50' placeholder='Votre commentaire' required>
        </textarea> <br />
        <input type='submit' value='Commenter' />
    </form>
</div>


<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
