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

    <tr class='blockEpisode'>
        <td class='titleEpisode'><?= $episode['titre'] ?></td>
        <td><a href='home.php?rubric=modifyEpisode&id=<?= $episode["id"] ?>&typeManage=modify'>Modifier</a></td>
        <td><a href='home.php?rubric=modifyEpisode&id=<?= $episode["id"] ?>&typeManage=delete'>Supprimer</a></td>
    </tr>

<?php endforeach; ?>
    
</table>
<form method='post' action='home.php?rubric=modifyEpisode&id=<?= $idEpisode ?>&typeManage=modify'>
    <input type='hidden' id='idEditEpisode' name='idEditEpisode' value='<?php echo $idEpisode; ?>' required />
    <label for='titleEditEpisode'>TITRE DE L'EPISODE</label>
    <input type='text' id='titleEditEpisode' name='titleEditEpisode' value='<?php echo $titleEpisode; ?>' required /> <br />
    <label for='contentEditEpisode'>CONTENU DE L'EPISODE</label>
    <textarea id='contentEditEpisode' name='contentEditEpisode' rows='30' cols='60'required> <?= $contentEpisode ?> </textarea> <br />
    <input class='submit' type='submit' value="Modifiez l'épisode" />
</form>
<?php
$sectionContent = ob_get_clean();
?>