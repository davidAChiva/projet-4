<?php
$title = 'Modifier le commentaire | Billet simple pour l\'Alaska';
ob_start();
?>
<h2>MODERER LE COMMENTAIRE</h2>
<form method='post' action='home.php?rubric=manageComments&idEpisode=<?= $comment['id'] ?>&typeManage=modify&idComment=<?= $comment["id"] ?>'>
    <input type='text' id='idComment' name='idComment' value='<?= $comment['id'] ?>'hidden></input>
    <input type='text' id='authorComment' name='authorComment' value='<?= $comment['author'] ?>'></input>
    <textarea id='contentComment' name='contentComment' rows='10'><?= $comment['content'] ?></textarea>
    <input class='submit'type='submit' value='Modifier' </input>
</form>

<?php
$sectionContent = ob_get_clean();
?>
