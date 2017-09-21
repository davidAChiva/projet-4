<?php
session_start();
?>
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
            <h1>BILLET SIMPLE POUR L'ALASKA | <span>Jean Forteroche</span></h1>
            <nav>
                <a href='index.php'>ACCUEIL</a>
                <a href='index.php?action=author'>L'AUTEUR</a>
                <?php
                if (isset($_SESSION['pseudo']))
                {
                ?>
                    <a href='admin0085/home.php'>Administration</a>
                <?php
                }
                ?>
            </nav>
            <div>
                <a href=''><i class="fa fa-facebook fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
                <a href=''><i class="fa fa-twitter fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
            </div>
        </header>
        <div id='banner'></div>
        <section id='sectionHome'>
            <?= $sectionContent ?>
        </section>
        <footer>
            <a href='index.php?action=mentions'>Mentions légales</a>
            <h4>COPYRIGHT JEAN FORTEROCHE</h4>
        </footer>
    </body>
</html>
