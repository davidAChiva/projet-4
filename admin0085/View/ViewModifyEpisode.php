<?php
$title = 'Modifier un épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<table>
<caption><h2>GERER LES COMMENTAIRES</h2></caption>
    <tr>
        <th>Titre de l'épisode</th>
        <th colspan='2'>Action</th>
    </tr>
<?php foreach($episodes as $episode): ?>

    <tr class='blockEpisode'>
        <td class='titleEpisode'><?= $episode['titre'] ?></td>
        <td><a href='home.php?rubric=modifyEpisode&id= <?= $episode["id"] ?>'>Modifier</a></td>
        <td><a href=''>Supprimer</a></td>
    </tr>

<?php endforeach; ?>
</table>
<form method='post' action='home.php?rubric=modifyEpisode&id=<?= $idEpisode ?>'>
    <input type='hidden' id='idEditEpisode' name='idEditEpisode' value='<?php echo $idEpisode; ?>' required />
    <label for='titleEditEpisode'>TITRE DE L'EPISODE</label>
    <input type='text' id='titleEditEpisode' name='titleEditEpisode' value='<?php echo $titleEpisode; ?>' required /> <br />
    <label for='contentEditEpisode'>CONTENU DE L'EPISODE</label>
    <textarea id='contentEditEpisode' name='contentEditEpisode' rows='20'required> <?= $contentEpisode ?> </textarea>
    <input type='submit' value="Modifiez l'épisode" />
</form>
<?php
$sectionContent = ob_get_clean();
?>