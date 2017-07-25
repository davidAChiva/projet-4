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
}