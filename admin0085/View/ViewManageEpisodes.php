<?php
$title = 'Modifier un épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<table>
<caption><h2>GERER LES EPISODES</h2></caption>
    <tr>
        <th>Titre de l'épisode</th>
        <th colspan='2'>Action</th>
    </tr>
<?php foreach($episodes as $episode): ?>

    <tr>
        <td class='titleEpisode'><?= $episode['title'] ?></td>
        <td><a  class='action' href='home.php?rubric=modifyEpisode&id=<?= $episode["id"] ?>&typeManage=modify'>Modifier</a></td>
        <td><a class='action' href='home.php?rubric=modifyEpisode&id=<?= $episode["id"] ?>&typeManage=delete'>Supprimer</a></td>
    </tr>

<?php endforeach; ?>
</table>
<?php $sectionContent = ob_get_clean(); ?>
