<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?= $racineWeb ?>">
        <title><?=$title?></title>
        <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div id="container">
            <header class="row">
                <!-- <a href="../home/posts"><h1 id="bookTitle">Billet simple pour l'Alaska de Jean Forteroche</h1></a> -->
                <h1 class="col-lg-12" id="bookTitle">Billet simple pour l'Alaska par Jean Forteroche</h1>                    
            </header>
            <div class="col-lg-12" class="homeText">
                <p>Bienvenue!<br>Pour mon douzième roman,j'ai souhaité vous le faire découvrir dans un tout autre format que celui d'un livre papier,un blog.</p>
                <a class= "btn btn-success" href="<?='auth/login/'?>">Connexion</a>

            </div>
            <section class="row">
                <div class="col-lg-12" id="content">
                    <?=$content?>
                </div>
            </section>
            
            <hr>
            <footer>
                <p>Mentions légales</p>
            </footer>
        </div>
    </body>
</html>