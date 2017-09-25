<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../css/general.css' />
        <link rel='stylesheet' href='../css/back.css' />
        <title><?= $title ?></title>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fju9kgi13tqikw0xs5l829etnxom79m8xc1wcq4q059guf6h'></script>
        <script>tinymce.init({ mode: 'exact',elements:'contentEditEpisode,contentNewEpisode'});</script>
    </head>
    <body>
        <header>
            <h1>ADMINISTRATION </br > BILLET SIMPLE POUR L'ALASKA</h1>
        </header>
        <div id='banner'></div>
    <div class='mainBlock'>
        <nav>
            <div>
            <a href='home.php'>ACCUEIL</a>
            <h2>MON COMPTE</h2>
            <a href='home.php?action=manageAccount&typeManage=modifyInformations'>GERER MON COMPTE</a>
            <a href='home.php?action=manageAccount&typeManage=deconnexion'>DECONNEXION</a>
            </div>
            <div>
            <h2>EPISODES ET COMMENTAIRES</h2>
            <a href='home.php?action=newEpisode'>CREER UN NOUVEL EPISODE</a>
            <a href='home.php?action=manageEpisode'>GERER LES EPISODES</a>
            <a href='home.php?action=manageComments'>GERER LES COMMENTAIRES</a>
            </div>
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
