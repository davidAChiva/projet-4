<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' />
        <link rel='stylesheet' href='css/generalBack.css' />
        <title>Connexion Admin | Billet simple pour l'Alaska</title>
    </head>
    <body>
        <form method='post' action='connexionSecure.php'>
            <label for='pseudoAdmin'> Pseudo</label>
            <input type='text' id='pseudoAdmin' name='pseudoAdmin' required /> <br />
            <label for='passwordAdmin'>Votre mot de passe</label>
            <input type='password' id='passwordAdmin' name='passwordAdmin' required /> <br />
            <input type='submit' value='Envoyer' />
        </form>
    </body>
</html>