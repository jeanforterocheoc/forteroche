<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= $racineWeb ?>">
    <title><?=$title?></title>
    <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styleAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="app/lib/DataTables/media/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
  </head>

  <body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1 admin">
      <div class="navbar-header col-md-4  titleAdminNav">
          <p>Espace d'administration</p>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="user/userAdmin">Accueil administration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home/homepage" target="_blank">Voir le blog</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item avatar">
            <a class="nav-link p-0" href="user/userAdmin">
              <img src="public/images/man.svg" alt="man's avatar" class="rounded-circle z-depth-0" alt="avatar image" height="35">
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <section>
        <div id="content">
          <?=$content?>
        </div>
      </section>
    </div>
    <hr>
    
    <footer>
      <p>© 2019 Jean Forteroche - Espace administration</p>
    </footer>
    
    <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="public/js/tinymce.js"></script>
    <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="app/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="public/js/table.js"></script>
    <script type="text/javascript" src="public/js/deleteUser.js"></script>
    <script type="text/javascript" src="public/js/modifyUser.js"></script>

  </body>
</html>
