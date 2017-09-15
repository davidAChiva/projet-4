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
    // Liste de tous les commentaires
    public function getAllComments()
    {
        $sql = 'SELECT comments.id,comments.author,comments.content,DATE_FORMAT(comments.date_comment, "%d/%m/%Y") AS date_comment,comments.episode_id,episodes.titre
        FROM comments
        INNER JOIN episodes
        ON comments.episode_id = episodes.id
        ORDER BY episodes.id ASC ';
        $comments = $this->executeRequest($sql);
        return $comments;
    }
    // Liste des commentaires de l'épisode concerné
    public function getComments($idEpisode)
    {
        $sql = 'SELECT comments.id,comments.author,comments.content,DATE_FORMAT(comments.date_comment, "%d/%m/%Y") AS date_comment,comments.episode_id,episodes.titre
        FROM comments
        INNER JOIN episodes
        ON comments.episode_id = episodes.id
        WHERE comments.episode_id = ?';
        $comments = $this->executeRequest($sql, array($idEpisode));
        return $comments;
    }
    // Récupére un commentaire
    public function getComment($idComment)
    {
        $sql = 'SELECT id,author,content FROM comments WHERE id=?';
        $comment = $this->executeRequest($sql, array($idComment));
         if ($comment ->rowCount() === 1)
        {
            return $comment->fetch();
        }
        else
        {
            throw new Exception("Aucun commentaire ne correspond à l'identifiant" . $idComment);
        }
    }
    // Récupére les 5 derniers commentaires
    public function getLastComments()
    {
        $sql= 'SELECT id,author,content,DATE_FORMAT(date_comment, "%d/%m/%Y") AS date_comment FROM comments ORDER BY id DESC LIMIT 5';
        $lastComments = $this->executeRequest($sql);
        return $lastComments;
    }
    // Ajoute un commentaire à la base
    public function setComment($author, $content, $idEpisode)
    {
        $sql = 'INSERT INTO comments(author, content, date_comment, episode_id) VALUES(?, ? , CURDATE(), ?)';
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
    public function deleteCommentsEpisode($idEpisode)
    {
        $sql = 'DELETE FROM comments WHERE episode_id=?';
        $deleteCommentsEpisode =$this->executeRequest($sql, array($idEpisode));
        return $deleteCommentsEpisode;
    }
}