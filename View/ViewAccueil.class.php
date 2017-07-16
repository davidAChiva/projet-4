<?php

class ViewAccueil
{
    private $title;
    private $sectionContents
        
    public function __construct() 
    {
        $this->title = "Accueil-blog";
        $this->sectionContents = $this->ContentsAccueil();
    }
    
    public function contentsAccueil()
    {
    ?>
    <p>Hello !</p>
    <?php
    }
}
?>

