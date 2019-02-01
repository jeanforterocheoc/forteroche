<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Le dernier ouvrage de Jean Forteroche intitulé billet simple pour l'Alaska,est présenté sous la forme d'un blog.Il souhaite,à travers ce roman impliquer ses lecteurs,en leur proposant de réagir aux chapitres publiés sur ce blog.">
    <base href="<?= $racineWeb ?>">
    <title>
      <?=$title?>
    </title>
    <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <div class="navbar-header ">
            <a class="logo" href="home/homepage"><i class="fas fa-book"></i></a>
          </div>
          <div class="navbar-header col-md-8  titleNav">
            <p>Billet simple pour l' Alaska</p>
            <!-- bouton menu burger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-right">
              <li class="nav-item active">
                <a class="nav-link" href="home/homepage"><i class="fas fa-home">Accueil <span class="sr-only">(current)</span></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="posts/posts"><i class="fas fa-book-open">Chapitres</i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user">Administration</i></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="auth/login">Connexion</a>
                </div>
              </li>
            </ul>
          </div>
        </div> <!-- container -->
      </nav>
    </header>
    <div class="container-fluid contentTemplate">
      <div class=" content">
        <?=$content?>
      </div>
    </div> <!-- container contentTemplate -->

    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">© 2019 Copyright - Jean Forteroche</div>
    </footer>

    <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--Signalement d'un commentaire -->
    <script type="text/javascript" src="public/js/report.js"></script>
  </body>
</html>