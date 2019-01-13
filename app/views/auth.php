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

    <form action="<?='admin/homeAdmin'?>" method="post">
    <div class="form-group">
        <label for="username">Pseudo</label><br>
        <input type="text" class="form-control" name="username" id="username" placeholder="Pseudo"><br><br>
    </div>

    <div class="form-group">
      <label for="password">Password</label><br>
      <input type="text" class="form-control" name="password" id="password" placeholder="Password"><br><br>
    </div>
    
    <button type="submit" name="login" id="login" class="btn btn-primary">Se connecter</button>
</form>

  </body>
</html>
