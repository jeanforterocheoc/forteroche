<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?= $racineWeb ?>">
    <title><?=$title?></title>
    <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">

    <!-- <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script> -->
    <!-- <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-expand-sm navbar-light " style="#4896C4">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home/homepage"><i class="fas fa-book"></i></a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="container">
        <header class="text-center">
          <h1  id="bookTitle">Billet simple pour l'Alaska par Jean Forteroche</h1>
        </header>
        <div class="text-center" class="homeText">
          <p>Bienvenue!<br>Pour mon douzième roman,j'ai souhaité vous le faire découvrir dans un tout autre format que celui d'un livre papier,un blog.</p>
        </div>
        <br>
        <br>
        <section class="row">
          <div class="col-lg-12" id="content">
            <?=$content?>
          </div>
        </section>
        <hr>
        <footer>
          <p>Mentions légales</p>
          <p><a href="<?='auth/login/'?>">Connexion</a></p>
          <p><a href="auth/logout">Se déconnecter</a></p><br>
        </footer>
      </div>
    </div>
  </body>
</html>
