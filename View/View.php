<?php

class Vue 
{
    
    private $file;
    
     
    private $title;
    
    public function __construct($action) {
        // Nom du fichier = action du lien
        $this->file = "Vue/vue" . $action . ".php";
    }
    
    // Affichage de la vue
    public function generer($donnees) {
            
    }
}