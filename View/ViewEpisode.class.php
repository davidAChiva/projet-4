<?php
$title = "Episode";
ob_start();
?>
<article>
    <h1>TEST</h1>
</article>
<?php
$sectionContent = ob_get_clean();
require 'View/template.php';
?>
