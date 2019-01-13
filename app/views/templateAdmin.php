<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?= $racineWeb ?>">
        <title><?=$title?></title>
        <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/styleAdmin.css">

        <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#mytextarea',
                
            });
        </script>
    </head>
    <body>
        <div id="container">
            <header >
                <h2 id="bookTitle">Bienvenue sur l'espace d'administration</h2>                
            </header>
            <section>
                <div id="content">
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