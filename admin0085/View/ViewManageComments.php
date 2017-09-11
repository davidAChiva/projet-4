<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
    <h3>Sélectionnez l'épisode des commentaires à modifier</h3>
    <div id='linkEpisode'>
    <?php foreach($episodes as $episode): ?>
        <a href='<?= 'home.php?rubric=manageComments&idEpisode=' . $episode["id"] ?>'><?= $episode['titre'] ?></a>
    <?php endforeach; ?>
     </div>

    <div class='blockComments'>
            <table>
                <caption><h2>Commentaires de l'épisode</h2></caption>
                    <tr>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th colspan='2'>Action</th>
                    </tr>
                    <?php foreach($comments as $comment): ?>

                    <tr>
                            <td><?= $comment['author'] ?></td>
                            <td><?= $comment['content'] ?></td>
                            <td><a href='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=modify&idComment=<?= $comment["id"] ?>'>Modifier</a></td>
                        <td><a href='home.php?rubric=manageComments&idEpisode=<?= $comment['episode_id'] ?>&typeManage=delete&idComment=<?= $comment["id"] ?>'>Supprimer</a></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
    </div>
    
<?php
$sectionContent = ob_get_clean();
?>