<?php
$title = 'Modifier le commentaire | Billet simple pour l\'Alaska';
ob_start();
?>

<h2>MODERER LE COMMENTAIRE</h2>
<form method='post' action='home.php?action=manageComments&typeManage=modify&idComment=<?= $comment->getIdComment() ?>#message'>
    <input type='hidden' id='idComment' name='idComment' value='<?= $comment->getIdComment() ?>'/>
    <h3><label for='authorComment'>Auteur du commentaire</label></h3>
    <input type='text' id='authorComment' name='authorComment' value='<?= $comment->getAuthorComment() ?>'/>
    <h3><label for='contentComment'>Contenu du commentaire</label></h3>
    <textarea id='contentComment' name='contentComment' rows='10' cols='60'><?= $comment->getContentComment() ?></textarea>
    <div class='blockButtonForm'>
        <input class='submit'type='submit' value='Modifier' />
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
