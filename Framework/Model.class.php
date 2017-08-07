<?php
require_once 'Configuration.class.php';
    
abstract class Model 
{
    // Objet PDO d'accès à la base de donnée
    private static $bdd;
    
    protected function executeRequest($sql, $params = null)
    {
        if ($params == null) 
        {
            $results = self::getBdd()->query($sql); // Exécution directe
        }
        
        else
        {
            $results = self::getBdd()->prepare($sql); // Exécution préparée
            $results->execute($params);
        }
        return $results;
    }
    
    // Connexion à la base de donnée
    private function getBdd()
    {
        if (self::$bdd == null)
        {
            // Récupération des paramètres de connexion
            $dsn = Configuration::get('dsn');
            $login = Configuration::get('login');
            $password = Configuration::get('password');
            
            // Connexion à la BD
            self::$bdd = new PDO($dsn,$login,$password,array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}