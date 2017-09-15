<?php $title = 'Modification de l\'épisode | Billet simple pour l\'Alaska';
ob_start();
?>

<form method='post' action='home.php?rubric=modifyEpisode&id=<?= $episode['id'] ?>&typeManage=modify'>
    <input type='hidden' id='idEditEpisode' name='idEditEpisode' value='<?= $episode['id'] ?>' required />
    <h3><label for='titleEditEpisode'>TITRE DE L'EPISODE</label></h3>
    <input type='text' id='titleEditEpisode' name='titleEditEpisode' value='<?= $episode['titre'] ?>' required /> <br />
    <h3><label for='contentEditEpisode'>CONTENU DE L'EPISODE</label></h3>
    <textarea id='contentEditEpisode' name='contentEditEpisode' rows='30' cols='60'required> <?= $episode['contenu'] ?> </textarea> <br />
    <input class='submit' type='submit' value="Modifiez l'épisode" />
</form>

<?php $sectionContent = ob_get_clean(); ?>