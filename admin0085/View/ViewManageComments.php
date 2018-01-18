<?php
$title = 'Gérer les commentaires | Billet simple pour l\'Alaska';
ob_start();
?>
    <h2>Modération des commentaires</h2>
    <div id='linkEpisode'>
        <form method='post' action='home.php?action=manageComments'>
            <label for='idEpisodeGetComments'>FILTRER PAR EPISODE</label>
            <select name='idEpisodeGetComments' id='idEpisodeGetComments'>
                <option value='all'>Tous les épisodes</option>
                <?php foreach($episodes as $episode): ?>
                <option value='<?= $episode->getIdEpisode() ?>' ><?= $episode->getTitleEpisode() ?></option>
                <?php endforeach; ?>
                <input class='submit'type='submit' value='Sélectionnez'</input>
            </select>

        </form>
     </div>

    <div class='blockComments'>
        <table id='boardModifyComments'>
            <caption><h3>LES COMMENTAIRES</h3></caption>
                <tr>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th colspan='2'>Action</th>
                </tr>
                <?php foreach($comments as $comment): ?>

                <tr>
                    <td><?= $comment->getAuthorComment() ?></td>
                    <td><?= substr($comment->getContentComment(),0,100) ?></td>
                    <td><a href='home.php?action=manageComments&typeManage=modify&idComment=<?= $comment->getIdComment() ?>'>Modifier</a></td> 
                    <td><a onclick='return(confirm("Voulez confirmer la suppression du commentaire?"));' href='home.php?action=manageComments&typeManage=delete&idComment=<?= $comment->getIdComment() ?>'>Supprimer</a></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>
    
<?php
$sectionContent = ob_get_clean();
?>