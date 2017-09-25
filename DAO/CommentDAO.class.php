<?php
// Adaptation du chemin pour front et back
if (file_exists('Framework/Model.class.php') AND file_exists('Model/Comment.class.php'))
{
    require_once 'Framework/Model.class.php';
    require_once 'Model/Comment.class.php';
}
else
{
    require_once '../Framework/Model.class.php';
    require_once '../Model/Comment.class.php';
}
   

class CommentDAO extends Model
{
    // Liste de tous les commentaires
    public function getAllComments()
    {
        $sql = 'SELECT comments.id,comments.author,comments.content,DATE_FORMAT(comments.date_comment, "%d/%m/%Y") AS date_comment,comments.episode_id,episodes.title
        FROM comments
        INNER JOIN episodes
        ON comments.episode_id = episodes.id
        ORDER BY comments.episode_id ASC';
        $result = $this->executeRequest($sql);
        $comments = array();
        
        foreach ($result as $row)
        {
            $commentId = $row['id'];
            // Convertit un tableau en objet Episode
            $comments[$commentId] = $this->buildComment($row);
        }
        return $comments;
    }
    // Liste des commentaires de l'épisode concerné
    public function getComments($idEpisode)
    {
        $sql = 'SELECT comments.id,comments.author,comments.content,DATE_FORMAT(comments.date_comment, "%d/%m/%Y") AS date_comment,comments.episode_id,episodes.title
        FROM comments
        INNER JOIN episodes
        ON comments.episode_id = episodes.id
        WHERE comments.episode_id = ?';
        $result = $this->executeRequest($sql,array($idEpisode));
        $comments = array();
    
        foreach ($result as $row)
        {
            $commentId = $row['id'];
            // Convertit un tableau en objet Episode
            $comments[$commentId] = $this->buildComment($row);
        }
        return $comments;
    }
    // Récupére un commentaire
    public function getComment($idComment)
    {
        $sql = 'SELECT id, author, content, date_comment, episode_id FROM comments WHERE id=?';
        $row = $this->executeRequest($sql, array($idComment));
        if ($row->rowCount() === 1)
        {
            // Transforme l'objet PDO en tableau
            $comment = $row->fetch(PDO::FETCH_ASSOC);
            $comment = $this->buildComment($comment);

            return $comment;
        }
        else
        {
            throw new Exception("Aucun commentaire ne correspond à l'identifiant " . $idComment);
        }
    }
    // Récupére les 5 derniers commentaires
    public function getLastComments()
    {
        $sql= 'SELECT id,author,content,DATE_FORMAT(date_comment, "%d/%m/%Y") AS date_comment,episode_id FROM comments ORDER BY id DESC LIMIT 5';
        $result = $this->executeRequest($sql);
        $lastComments = array();
        
        foreach ($result as $row)
        {
            $lastCommentId = $row['id'];
            // Convertit un tableau en objet Episode
            $lastComments[$lastCommentId] = $this->buildComment($row);
        }
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
        $deleteCommentsEpisode = $this->executeRequest($sql, array($idEpisode));
        return $deleteCommentsEpisode;
    }
    // Crée un objet épisode en se basant sur $row
    // $row est un tableau qui regroupe les informations d'un commentaire
    
    private function buildComment(array $row)
    {
        $comment = new Comment;
        $comment->setIdComment($row['id']);
        $comment->setAuthorComment($row['author']);
        $comment->setContentComment($row['content']);
        $comment->setDateComment($row['date_comment']);
        $comment->setIdEpisode($row['episode_id']);
        if (array_key_exists('title',$row))
        {
            $comment->setTitleEpisode($row['title']);
        }
        return $comment;
    }
}