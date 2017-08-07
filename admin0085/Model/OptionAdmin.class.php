<?php
require_once '../Framework/Model.class.php';

class OptionAdmin extends Model
{
    // Requête pour enregistrer dans la BD le nouvel épisode
    
    public function setEpisode($title,$content)
    {
        $sql = 'INSERT INTO episodes (titre, contenu, date_creation) VALUES (?, ?, CURDATE())';
        $setEpisode = $this->executeRequest($sql,array($title,$content));
        return $setEpisode;
    }
    
    // Requête pour obtenir la liste de tous les épisodes
    public function getEpisodes()
    {
        $sql = 'SELECT id, titre, contenu, date_creation FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }
    
    // Affichage d'un seul épisode
    public function getEpisode($idEpisode)
    {
        $sql = 'SELECT id, titre, contenu, date_creation FROM episodes WHERE id = ?';
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
    
    // Modifie un épisode existant
    public function modifyEpisode($id,$title,$content)
    {
        $sql = 'UPDATE episodes SET titre=?,contenu=? WHERE id=?';
        $modifyEpisode = $this->executeRequest($sql, array($title,$content,$id));
        return $modifyEpisode;
    }
}