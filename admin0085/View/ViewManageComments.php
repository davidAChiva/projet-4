<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
<div>
    <h3>Sélectionnez l'épisode des commentaires à modifier</h3>

    <?php foreach($episodes as $episode): ?>

    <div class='blockEpisode'>
        <h1 class='titleEpisode'><?= $episode['titre'] ?></h1>
        <a href='<?= 'home.php?rubric=manageComments&idEpisode=' . $episode["id"] ?>'>Gérer les commentaires de cette épisode</a>
    </div>

    <?php endforeach; ?>

    <div class='blockComments'>
        <h2> Commentaires de l'épisode</h2>
    <?php foreach($comments as $comment): ?>
        <div class='comment'>
            <p><?= $comment['author'] ?></p>
            <p><?= $comment['content'] ?></p>

            <form  method='post' action='<?='home.php?rubric=manageComments&idEpisode=' . $_GET['idEpisode'] . '&typeManage=modify&idComment=' . $comment['id'] ?>'>
                <label for='idComment'>Id du commentaire</label>
                <input type='text' id='idComment' name='idComment' value='<?= $comment['id'] ?>' required />
                <label for='authorComment'>Auteur du commentaire</label>
                <input type='text' id='authorComment' name='authorComment' value= "<?= $comment['author'] ?>" required /> <br />
                <textarea id='contentComment' name='contentComment' rows='5'  required><?= $comment['content'] ?>
                </textarea> <br />
                <input type='submit' value='Modifier le commentaire' />
            </form> <br />
            <a id='deleteComment' href='<?='home.php?rubric=manageComments&idEpisode=' . $_GET['idEpisode'] . '&typeManage=delete&idComment=' .  $comment['id'] ?>'>Supprimer ce commentaire</a>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<?php
$sectionContent = ob_get_clean();
?>