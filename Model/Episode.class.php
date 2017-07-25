<?php

require_once 'Model/Model.class.php';

class Episode extends Model
{
    // Requête pour obtenir la liste de tous les billets
    public function getEpisodes()
    {
        $sql = 'SELECT id, titre, contenu, date_creation FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequete($sql);
        return $episodes;
    }
    
    // Affichage d'un seul billet
    public function getEpisode($idEpisode)
    {
        $sql = 'SELECT id, titre, contenu, date_creation FROM episodes WHERE id = ?';
        $episode = $this->executeRequete($sql, array($idEpisode));
        if ($episode ->rowCount() > 0)
        {
            return $episode->fetch();
        }
        else
        {
            throw new Exception("Aucun billet ne correspond à l'identifiant" . $idEpisode);
        }
    }
}