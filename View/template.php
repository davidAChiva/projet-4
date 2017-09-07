<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='css/general.css' />
        <link rel='stylesheet' href='css/front.css' />
        <title><?= $title ?></title>
        <script src="https://use.fontawesome.com/f520e036a2.js"></script>
    </head>
    <body>
        <header>
            <div>
                <h1>BILLET SIMPLE POUR L'ALASKA</h1>
                <h1>LIVRE DE JEAN FORTEROCHE</h1>
            </div>
            <div>
                <p>SUIVEZ MOI</p>
                <a href=''><i class="fa fa-facebook fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
                <a href=''><i class="fa fa-twitter fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
            </div>
                <nav>
                    <a href='index.php'>ACCUEIL</a>
                    <a href='contact.php'>CONTACT</a>
                </nav>
        </header>
        <div id='banner'></div>
        <section>
            <?= $sectionContent ?>
        </section>
        <footer>
            <h4>COPYRIGHT JEAN FORTEROCHE</h4>
            <a href='index.php?information=mentions'>Mentions légales</a>
        </footer>
    </body>
</html>
