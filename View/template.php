<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='css/generalFront.css' />
        <title><?= $title ?></title>
        <script src="https://use.fontawesome.com/f520e036a2.js"></script>
    </head>
    <body>
        <header>
            <div>
                <p>SUIVEZ MOI</p>
                <a href=''><i class="fa fa-facebook fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
                <a href=''><i class="fa fa-twitter fa-3x iconeFontAWeSome" aria-hidden="true"></i></a>
            </div>
            <h1>JEAN FORTEROCHE | ECRIVAIN</h1>
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
