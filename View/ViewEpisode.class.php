<?php

$title = $episode['titre'] . " | Billet simple pour l'Alaska" ;
ob_start();

?>
<div>
    <article>
        <h2><?= $episode['titre'] ?></h2>
        <p class='episodeDate'>Créer le <?= $episode['date_creation'] ?></p>
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
        <label for='author'><h4>Votre pseudo</h4></label> 
        <input type='text' id='formAuthorComment' name='author' value='<?= $valueAuthor ?>' required /> 
        <label for='comment'><h4>Votre commentaire</h4></label> 
        <textarea id='formAuthorComment' name='comment' rows='10' cols='75' required><?= $valueComment ?>
        </textarea> <br />
        <input class='submit'type='submit' value='Commenter' />
    </form>
</div>
    <p class='errorMessage'><?= $errorMessage ?></p>
</div>


<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
