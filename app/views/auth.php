<?php session_start()?>
<?php $this->title = 'Page d\'authentification'; ?> 

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Page d'authentification</title>

    <!-- Bootstrap core CSS -->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <form class="form-signin" action="<?='admin/homeAdmin'?>" method="post">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Merci d'indiquer vos identifiants</h1>
      </div>

      <div class="form-label-group">
        <input type="text" class="form-control" name="username" id="username" placeholder="Pseudo">
        <label for="username">Pseudo</label>
      </div>

      <div class="form-label-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>

      <button class="btn btn-lg btn-primary " type="submit" name="login" id="login">Se connecter</button>
      <a class= "btn btn-info btn-lg" href="home/homepage">Page d'accueil</a>      
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
  </body>
</html>
