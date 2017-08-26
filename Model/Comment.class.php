<?php
// Adaptation du chemin pour front et back
if (file_exists('Framework/Model.class.php'))
{
    require_once 'Framework/Model.class.php';
}
else
{
require_once '../Framework/Model.class.php';
}

class Comment extends Model
{
    // Liste des commentaires de l'épisode concerné
    public function getComments($idEpisode)
    {
        $sql = 'SELECT id,author,content,date_comment,episode_id FROM comments WHERE episode_id=?';
        $comments = $this->executeRequest($sql, array($idEpisode));
        return $comments;
    }
    // Récupére les 5 derniers commentaires
    public function getLastComments()
    {
        $sql= 'SELECT id,author,content,date_comment FROM comments ORDER BY id DESC LIMIT 5';
        $lastComments = $this->executeRequest($sql);
        return $lastComments;
    }
    // Ajoute un commentaire à la base
    public function setComment($author, $content, $idEpisode)
    {
        $sql='INSERT INTO comments(author, content, date_comment, episode_id) VALUES(?, ? , CURDATE(), ?)';
        $setComment = $this->executeRequest($sql, array($author, $content, $idEpisode));
        return $setComment;
    }
    // Modifie un commentaire existant
    public function modifyComment($id,$author,$content)
    {
        $sql = 'UPDATE comments SET author=?,content=? WHERE id=?';
        $modifyComment = $this->executeRequest($sql, array($author,$content,$id));
        return $modifyComment;
    }
    // Supprime un commentaire
    public function deleteComment($idComment)
    {
        $sql = 'DELETE FROM comments WHERE id=?';
        $deleteComment = $this->executeRequest($sql,array($idComment));
        return $deleteComment;
    }
    // Jointure 'episodes & commentaires'
    public function getCommentsEpisodes
    {
        
    }
}