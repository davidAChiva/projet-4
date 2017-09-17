<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='../css/general.css' />
        <link rel='stylesheet' href='../css/back.css' />
        <title>Connexion Admin | Billet simple pour l'Alaska</title>
    </head>
    <body>
        <header>
        <h1>ADMINISTRATION | BILLET POUR L'ALASKA</h1>
        </header>
        <form method='post' action='index.php'>
            <label for='pseudoAdmin'>PSEUDO</label>
            <input type='text' id='pseudoAdmin' name='pseudoAdmin' required /> <br />
            <label for='passwordAdmin'>MOT DE PASSE</label>
            <input type='password' id='passwordAdmin' name='passwordAdmin' required /> <br />
            <input class='submit' type='submit' value='Envoyer' />
        </form>
    </body>
</html>