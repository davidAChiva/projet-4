<?php

require_once 'Model/Model.class.php';

class Comment extends Model
{
    // Liste des commentaires de l'épisode concerné
    public function getComments($idEpisode)
    {
        $sql = 'SELECT id,author,content,date_comment,episode_id FROM comments WHERE episode_id=?';
        $comments = $this->executeRequest($sql, array($idEpisode));
        return $comments;
    }
    // Ajoute un commentaire à la base
    public function setComment($author, $content, $idEpisode)
    {
        $sql='INSERT INTO comments(author, content, date_comment, episode_id) VALUES(?, ? , CURDATE(), ?)';
        $setComment = $this->executeRequest($sql, array($author, $content, $idEpisode));
        return $setComment;
        
    }
}