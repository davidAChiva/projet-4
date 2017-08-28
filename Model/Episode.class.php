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


class Episode extends Model
{
    // Requête pour obtenir la liste de tous les épisodes dans l'ordre décroissant
    public function getEpisodesDesc()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }
    //Requête pour obtenir la liste de tous les épisodes dans l'ordre croissant
    public function getEpisodesAsc()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation FROM episodes ORDER BY id';
        $episodes = $this->executeRequest($sql);
        return $episodes;    
    }
    
    // Affichage d'un seul épisode
    public function getEpisode($idEpisode)
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation FROM episodes WHERE id = ?';
        $episode = $this->executeRequest($sql, array($idEpisode));
        if ($episode ->rowCount() === 1)
        {
            return $episode->fetch();
        }
        else
        {
            throw new Exception("Aucun billet ne correspond à l'identifiant" . $idEpisode);
        }
    }
    // Récupére le dernier épisode
    public function getLastEpisode()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation FROM episodes ORDER BY id DESC LIMIT 0,1';
        $lastEpisode = $this->executeRequest($sql);
        return $lastEpisode->fetch();
    }
    // Requête pour enregistrer dans la BD le nouvel épisode
    public function setEpisode($title,$content)
    {
        $sql = 'INSERT INTO episodes (titre, contenu, date_creation) VALUES (?, ?, CURDATE())';
        $setEpisode = $this->executeRequest($sql,array($title,$content));
        return $setEpisode;
    }
        // Modifie un épisode existant
    public function modifyEpisode($id,$title,$content)
    {
        $sql = 'UPDATE episodes SET titre=?,contenu=? WHERE id=?';
        $modifyEpisode = $this->executeRequest($sql, array($title,$content,$id));
        return $modifyEpisode;
    }
    // Supprime un épisode existant
    public function deleteEpisode($id)
    {
        $sql = 'DELETE from episodes WHERE id = ?';
        $deleteEpisode = $this->executeRequest($sql, array($id));
        return $deleteEpisode;
    }
}