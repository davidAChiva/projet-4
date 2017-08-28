<?php

$title = $episode['titre'] . " | Billet simple pour l'Alaska" ;
ob_start();

?>
<div>
<article>
    <h2><?= $episode['titre'] ?></h2>
    <p><?= $episode['date_creation'] ?></p>
    <div class='episodeContent'><?= $episode['contenu'] ?></div>   
    </article>
<div id='blockComment'>
    <h3>COMMENTAIRES DE L'EPISODE</h3>

    <?php foreach ($comments as $comment): ?>
    <div class='comment'>
        <p class='commentAuthor'> <?= $comment['author'] ?> <span> <?= $comment['date_comment'] ?></span></p> 
        <p class='commentContent'> <?= $comment['content'] ?></p>
    </div>
<?php endforeach; ?>
</div>
<h3>AJOUTER UN COMMENTAIRE</h3>
<div id='formComment'>
    <form  method='post' action='index.php?episode= <?= $_GET['episode'] ?>'>
        <label for='author'>Votre pseudo</label> <br />
        <input type='text' id='formAuthorComment' name='author' required /> <br />
        <label for='comment'>Votre commentaire</label> <br />
        <textarea id='comment' name='comment' rows='10' cols='50' placeholder='Votre commentaire' required>
        </textarea> <br />
        <input class='submit'type='submit' value='Commenter' />
    </form>
</div>
</div>


<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
