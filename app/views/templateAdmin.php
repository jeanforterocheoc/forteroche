<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?= $racineWeb ?>">
        <title><?=$title?></title>
        <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/styleAdmin.css">

    </head>
    <body>
        <div id="container">
            <header>
                <!-- <a href="../home/posts"><h1 id="bookTitle">Billet simple pour l'Alaska de Jean Forteroche</h1></a> -->
                <h1 id="bookTitle">Bienvenue sur l'espace d'administration</h1>                
            </header>
            <div id="content">
                <?=$content?>
            </div>
            <hr>
            <footer>
                <p>Mentions légales</p>
            </footer>
        </div>
    </body>
</html>