<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"
    <title><?= $title ?></title> 
</head>
<body>
    <div id="container">
        <header>
            <a href="index.php"><h1 id="bookTitle">Billet simple pour l'Alaska de Jean Forteroche</h1></a>
            <p>Bienvenue!<br>A travers ce blog,vous allez pouvoir découvrir mon nouveau.</p>
        </header>
        <div id="content">
            <?= $content ?>
        </div>
        <footer id="footer">
            Mentions légales
        </footer>
    </div>
</body>
</html>