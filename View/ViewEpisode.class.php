<?php
$title = $episode['titre'] . " | Billet simple pour l'alaska" ;
ob_start();
?>
<article>
    <h3><?= $episode['titre'] . " Date : " . $episode['date_creation'] ?></h3>
    <p><?= $episode['contenu'] ?></p>
    
</article>
<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
