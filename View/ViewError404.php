<?php
$title = 'Erreur 404 | Billet simple pour l\'Alaska';
ob_clean();
?>
<div>
<h2>ERREUR 404</h2>
<p>Erreur : <?= $errorMessage ?></p>
</div>
<?php
$sectionContent = ob_get_clean();
require_once'view/template.php';
?>