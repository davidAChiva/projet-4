<?php
$title = 'Modifier un épisode | Billet simple pour l\'Alaska';
ob_start();
?>
<div>
<h3>Sélectionnez l'épisode à modifier</h3>
<?php foreach($episodes as $episode): ?>

<div class='blockEpisode'>
    <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
    <a href='<?= 'home.php?option=modifyEpisode&id=' . $episode["id"] ?>'>Modifier cette épisode</a>
</div>

<?php endforeach; ?>

<form method='post' action='home.php?option=modifyEpisode&id=<?= $idEpisode ?>'>
    <label for='idEditEpisode'>ID de l'épisode</label>
    <input type='text' id='idEditEpisode' name='idEditEpisode' value='<?php echo $idEpisode; ?>' required />
    <label for='titleEditEpisode'>TITRE DE L'EPISODE</label>
    <input type='text' id='titleEditEpisode' name='titleEditEpisode' value='<?php echo $titleEpisode; ?>' required /> <br />
    <label for='contentEditEpisode'>CONTENU DE L'EPISODE</label>
    <textarea id='contentEditEpisode' name='contentEditEpisode' rows='20'required> <?= $contentEpisode ?> </textarea>
    <input type='submit' value="Modifiez l'épisode" />
</form>
</div>
<?php
$sectionContent = ob_get_clean();
?>