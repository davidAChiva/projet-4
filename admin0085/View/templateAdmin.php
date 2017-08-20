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
        <section>
            <?= $sectionContent ?>
        </section>
        <footer>
            <h4>COPYRIGHT JEAN FORTEROCHE</h4>
        </footer>
    </body>
</html>
