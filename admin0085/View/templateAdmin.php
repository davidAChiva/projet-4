<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='css/generalBack.css' />
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <ul>
                <li>Accueil</li>
                <li>Gérer mon compte</li>
                <li>Déconnexion</li>
            </ul>
        </header>
        <section id='blockBook'>
            <div id='bookAlaska'>
            <img src='images/photo-paysage-alaska.jpg' alt='Image paysage en Alaska'> 
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