<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Le dernier ouvrage de Jean Forteroche intitulé billet simple pour l'Alaska,est présenté sous la forme d'un blog.Il souhaite,à travers ce roman impliquer ses lecteurs,en leur proposant de réagir aux chapitres publiés sur ce blog. ">
    <base href="<?= $racineWeb ?>">
    <title><?=$title?></title>
    <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="logo" href="home/homepage"><i class="fas fa-book"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="home/homepage">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts/posts">Les chapitres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auth/login">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <header class="blog-header">
        <h1 class="bookTitle">Billet simple pour l'Alaska par Jean Forteroche</h1>
      </header>
      <div class="jumbotron bg-white">
        <div class=" content">
          <?=$content?>
        </div>
      </div>
    </div> <!-- container -->


        <footer>
          <p>Mentions légales</p>
        </footer>
      <!-- </div>  container-->
      <!-- <script type="text/javascript" src="public/js/navigation.js"></script> -->

  </body>
</html>
