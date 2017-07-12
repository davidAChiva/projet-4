<?php

abstract class Modele 
{
    // Objet PDO d'accès à la base de donnée
    private $bdd
    
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) 
        {
            $req = $this->getBdd()->query($sql); // Exécution directe
        }
        
        else
        {
            $req = $this->getBdd()->prepare($sql); // Exécution préparée
            $req->execute($params);
        }
        return $req;
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