<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
    <h2>Modération des commentaires</h2>
    <div id='linkEpisode'>
        <form method='post' action='home.php?rubric=manageComments'>
            <label for='idEpisodeGetComments'>TRIER PAR EPISODE</label>
            <select name='idEpisodeGetComments' id='idEpisodeGetComments'>
                <?php foreach($episodes as $episode): ?>
                <option value='<?= $episode['id'] ?>'><?= $episode['titre'] ?></option>
                <?php endforeach; ?>
                <input class='submit'type='submit' value='Sélectionnez cet épisode'</input>
            </select>

        </form>
     </div>

    <div class='blockComments'>
            <table id='BoardModifyComments'>
                <caption><h3>Les commentaires</h3></caption>
                    <tr>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th colspan='2'>Action</th>
                    </tr>
                    <?php foreach($comments as $comment): ?>

                    <tr>
                            <td><?= $comment['author'] ?></td>
                            <td><?= substr($comment['content'],0,100) ?></td>
                            <td><a href='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=modify&idComment=<?= $comment["id"] ?>'>Modifier</a></td>
                        <td><a href='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=delete&idComment=<?= $comment["id"] ?>'>Supprimer</a></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
    </div>
    
<?php
$sectionContent = ob_get_clean();
?>