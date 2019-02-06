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
              <li class="nav-item">
                <a class="nav-link" href="posts/contactAuthor"><i class="fas fa-user">Contact</i></a>
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
    
    <!-- Footer -->
    <footer class="page-footer font-small mdb-color pt-4">
      <div class="container text-center text-md-left">
        <div class="row text-center text-md-left mt-3 pb-3">

          
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Lorem ipsum</h6>
            <p> Lorem ipsum dolor sit amet, consectetur
              adipisicing elit.</p>
          </div>
          <hr class="w-100 clearfix d-md-none">

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Liens utiles</h6>
            <p>
            <a  href="auth/login">Administration</a>
            </p>
          </div>
          <hr class="w-100 clearfix d-md-none">
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> 12 rue du livre,75000 Paris</p> 
            <p><i class="fas fa-envelope mr-3"></i> jeanforte49@gmail.com</p>
          </div>
        </div> <!-- Footer links -->
        <hr>
        <div class="row d-flex align-items-center">
          <div class="col-md-7 col-lg-8">
            <p class="text-center text-md-left">© 2019 Tous droits réservés</p>
          </div>
        </div> <!-- Grid row -->
      </div><!-- Footer Links -->
    </footer>
    
    <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/report.js"></script> <!--Report Comment -->
  </body>
</html>