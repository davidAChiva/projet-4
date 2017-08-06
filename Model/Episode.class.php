<?php

require_once 'Framework/Model.class.php';

class Episode extends Model
{
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
}