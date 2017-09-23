<?php

$title = "Accueil | Billet simple pour l'Alaska";

ob_start();
?>
<div id='sectionLeftHome'>
<h2>LES DERNIERS EPISODES</h2>   
<?php foreach ($lastEpisodes as $lastEpisode): ?>
    <div class='episode'>
        <h3 class='titleEpisode'><?= $lastEpisode->getTitleEpisode() ?></h3>
        <p class='contentEpisode'> <?= substr($lastEpisode->getContentEpisode(),0,350) . '...' ?></p>
        <a href='<?= 'index.php?action=episode&id=' . $lastEpisode->getIdEpisode() ?>'>Voir l'épisode en entier</a>
    </div>
<?php endforeach; ?>
</div>
<div id='sectionRightHome'>
    <div id='blockAllEpisodes'>
        <h2>LISTE DES EPISODES</h2>
        <?php foreach ($episodes as $episode): ?>
        <a href='<?= 'index.php?action=episode&id=' . $episode->getIdEpisode() ?>'><?= $episode->getTitleEpisode() ?> </a>
        <?php endforeach; ?>
    </div>
    <div id='blockLastComments'>
    <h2>LES DERNIERS COMMENTAIRES</h2>
       <?php foreach ($lastComments as $lastComment): ?> 
        <div class='lastComment'>
            <p class='lastCommentContent'><?= $lastComment['content'] ?></p>
            <p class='lastCommentAuthor'>écrit par <?= $lastComment['author'] ?></p>
            <p class='lastCommentDate'>Le <?= $lastComment['date_comment'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $sectionContent = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>