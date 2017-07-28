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
}