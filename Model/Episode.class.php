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
}