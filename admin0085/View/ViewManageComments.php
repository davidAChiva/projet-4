<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
    <h3>Sélectionnez l'épisode des commentaires à modifier</h3>
    <div id='linkEpisode'>
    <?php foreach($episodes as $episode): ?>
        <a class='na' href='<?= 'home.php?rubric=manageComments&idEpisode=' . $episode["id"] ?>'><?= $episode['titre'] ?></a>
    <?php endforeach; ?>
     </div>

    <div class='blockComments'>
    
        <div class='comment'>
            <table>
                <caption><h2>Commentaires de l'épisode</h2></caption>
                    <tr>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th colspan='2'>Action</th>
                    </tr>
                    <?php foreach($comments as $comment): ?>

                    <tr>
                        <form method='post' action='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=modify&idComment=<?= $comment["id"] ?>'>
                            <input type='text' id='idComment' name='idComment' value='<?= $comment['id'] ?>'hidden></input>
                            <td><input type='text' id='authorComment' name='authorComment' value='<?= $comment['author'] ?>'></input></td>
                            <td><textarea id='contentComment' name='contentComment' rows='10'><?= $comment['content'] ?></textarea></td>
                            <td><input class='submit'type='submit' value='Modifier' </input></td>
                        </form>
                        <td><a href='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=delete&idComment=<?= $comment["id"] ?>'>Supprimer</a></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php
$sectionContent = ob_get_clean();
?>