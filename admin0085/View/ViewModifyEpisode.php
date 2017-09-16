<?php $title = 'Modification de l\'épisode | Billet simple pour l\'Alaska';
ob_start();
?>

<form method='post' action='home.php?action=manageEpisode&id=<?= $episode['id'] ?>&typeManage=modify#message'>
    <input type='hidden' id='idEditEpisode' name='idEditEpisode' value='<?= $episode['id'] ?>' required />
    <h3><label for='titleEditEpisode'>TITRE DE L'EPISODE</label></h3>
    <input type='text' id='titleEditEpisode' name='titleEditEpisode' value='<?= $episode['title'] ?>' required /> <br />
    <h3><label for='contentEditEpisode'>CONTENU DE L'EPISODE</label></h3>
    <textarea id='contentEditEpisode' name='contentEditEpisode' rows='30' cols='60'required> <?= $episode['content'] ?> </textarea> <br />
    <div class='blockButtonForm'>
    <input class='submit' type='submit' value='Modifier' />
    <input class='submit' type='reset' value='Annuler' />
    </div>
</form>

<?php
if (isset($message))
{
    echo '<p id=\'message\'>' . $message . '</p>';
}   
$sectionContent = ob_get_clean();
?>
