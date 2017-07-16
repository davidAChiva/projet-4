<?php

require_once 'Modele/Modele.php';

class Episode extends Modele
{
    // Requête pour obtenir la liste de tous les billets
    public function getEpisodes()
    {
        $sql = 'SELECT id, titre, contenu, date_creation FROM episodes BY id DESC';
        $episodes = $this->executeRequete($sql);
        return $episodes;
    }
}