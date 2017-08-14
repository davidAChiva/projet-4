<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='css/generalBack.css' />
        <title><?= $title ?></title>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fju9kgi13tqikw0xs5l829etnxom79m8xc1wcq4q059guf6h'></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
        <header>
            <ul>
                <li><a href='home.php'>Accueil</a></li>
                <li>Gérer mon compte</li>
                <li><a href='home.php?option=deconnexion'>Déconnexion</a></li>
            </ul>
        </header>
        <section id='blockBook'>
            <div id='bookAlaska'>
            <img src='../images/photo-paysage-alaska.jpg' alt='Image paysage en Alaska'> 
            <h1>BILLET SIMPLE POUR L'ALASKA</h1>
            <h2>Livre de Jean Forteroche</h2>    
            </div>
            <div>
            <?= $sectionContent ?>
            </div>
        </section>
        <footer>
            <h4>COPYRIGHT JEAN FORTEROCHE</h4>
        </footer>
    </body>
</html>
