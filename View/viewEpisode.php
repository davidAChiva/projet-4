<?php

$title = $episode->getTitleEpisode() . " | Billet simple pour l'Alaska" ;
ob_start();

?>
<div>
    <article>
        <h2><?= $episode->getTitleEpisode() ?></h2>
        <p class='episodeDate'>Créer le <?= $episode->getDateEpisode() ?></p>
        <div class='episodeContent'><?= $episode->getContentEpisode() ?></div>   
    </article>
    <div id='blockComment'>
        <h3>COMMENTAIRES DE L'EPISODE</h3>

        <?php foreach ($comments as $comment): ?>
            <div class='comment'>
                <p class='commentAuthor'> <?= $comment->getAuthorComment() ?> <span> <?= $comment->getDateComment() ?></span></p> 
                <p class='commentContent'> <?= $comment->getContentComment() ?></p>
                
                <form method='post' action='index.php?action=episode&id=<?= $_GET['id'] ?>#confirmSignal'>
                    <input type='hidden' id='signalIdComment' name='signalIdComment' value='<?= $comment->getIdComment() ?>' required />
                    <input type='hidden' id='signalCommentIdEpisode' name='signalCommentIdEpisode' value='<?= $_GET['id'] ?>' required />
                    <input type='submit' class='submit' value='Signaler' />
                </form>
            </div>
        <?php endforeach; ?>
</div>
<h3>AJOUTER UN COMMENTAIRE</h3>
<div id='formComment'>
    <form  method='post' action='index.php?action=episode&id=<?= $_GET['id'] ?>'>
        <label for='author'><h4>Votre pseudo</h4></label> 
        <input type='text' id='formAuthorComment' name='author' value='<?= $valueAuthor ?>' required /> 
        <label for='comment'><h4>Votre commentaire</h4></label> 
        <textarea id='formAuthorComment' name='comment' rows='10' cols='75' required><?= $valueComment ?>
        </textarea> <br />
        <div class='blockButtonForm'>
            <input class='submit'type='submit' value='Commenter' />
            <input class='submit'type='reset' value ='Annuler' />
        </div>
    </form>
</div>
    <p class='errorMessage'><?= $errorMessage ?></p>
    <?php if (isset($confirm))
    {
        echo '<p id=\'confirmSignal\'>' . $confirm . '</p>';
    }
    ?>
</div>


<?php
$sectionContent = ob_get_clean();
require 'view/template.php';
?>
