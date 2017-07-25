<?php

abstract class Model 
{
    // Objet PDO d'accès à la base de donnée
    private $bdd;
    
    protected function executeRequest($sql, $params = null)
    {
        if ($params == null) 
        {
            $results = $this->getBdd()->query($sql); // Exécution directe
        }
        
        else
        {
            $results = $this->getBdd()->prepare($sql); // Exécution préparée
            $results->execute($params);
        }
        return $results;
    }
    
    // Connexion à la base de donnée
    private function getBdd()
    {
        if ($this->bdd == null)
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}