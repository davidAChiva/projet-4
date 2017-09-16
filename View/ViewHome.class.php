<?php

$title = "Accueil | Billet simple pour l'Alaska";

ob_start();
?>
<div id='sectionLeftHome'>
<h2>LES DERNIERS EPISODES</h2>   
<?php foreach ($lastEpisodes as $lastEpisode): ?>
    <div class='episode'>
        <h3 class='titleEpisode'><?= $lastEpisode['title'] ?></h3>
        <p class='contentEpisode'> <?= substr($lastEpisode['content'],0,350) . '...' ?></p>
        <a href='<?= 'index.php?action=episode&id=' . $lastEpisode['id'] ?>'>Voir l'épisode en entier</a>
    </div>
<?php endforeach; ?>
</div>
<div id='sectionRightHome'>
    <div id='propos'>
    <h2>A PROPOS</h2>
        <p>
            Bienvenue sur mon blog ! <br />
            Je m'appelle Jean Forteroche et je suis écrivain. Je travaille actuellement sur mon prochain roman "Billet simple pour l'Alaska". je souhaite innover et le publier par épisode en ligne sur ce site.
            En espérant que le livre vous plaira, je vous souhaite une très bonne lecture.
            N'hésitez pas à laisser un commentaire.
        </p>
    </div>
    <div id='blockAllEpisodes'>
        <h2>LISTE DES EPISODES</h2>
        <?php foreach ($episodes as $episode): ?>
        <a href='<?= 'index.php?action=episode&id=' . $episode['id'] ?>'><?= $episode['title'] ?> </a>
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
<?php require 'View/template.php'; ?>