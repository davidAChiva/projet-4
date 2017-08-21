<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../css/general.css' />
        <link rel='stylesheet' href='../css/back.css' />
        <title><?= $title ?></title>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fju9kgi13tqikw0xs5l829etnxom79m8xc1wcq4q059guf6h'></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
        <header>
            <h1>ADMINISTRATION </br > BILLET SIMPLE POUR L'ALASKA</h1>
        </header>
        <div id='banner'></div>
    <div class='mainBlock'>
        <nav>
            <a href='home.php'>ACCUEIL</a>
            <h2>ADMINISTRATION DU COMPTE</h2>
            <a href='home.php?manageAccount=modify'>GERER MON COMPTE</a>
            <a href='home.php?manageAccount=deconnexion'>DECONNEXION</a>
            <h2>ADMINISTRATION EPISODES ET COMMENTAIRES</h2>
            <a href='home.php?rubric=newEpisode'>CREER UN NOUVEL EPISODE</a>
            <a href='home.php?rubric=modifyEpisode'>MODIFIER UN EPISODE</a>
            <a href='home.php?rubric=manageComments'>GERER LES COMMENTAIRES</a>
        </nav>
        <section>
            <?= $sectionContent ?>
        </section>
    </div>
        <footer>
            <h4>COPYRIGHT JEAN FORTEROCHE</h4>
        </footer>
    </body>
</html>
