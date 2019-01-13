<?php Messages::displayMsg()?>
<?php $this->title = 'Modification du mot de passe'; ?> 

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Modification du mot de passe</title>

    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">
      
        <h4>Réinitialisation du mot de passe</h4>
        <form action="" method='post'>
                <div>
                    <label for="email">Votre adresse mail</label><br>
                    <input type="email" name="email" id="email" required>
                </div>

                <div>
                    <label for="pass">Votre ancien mot de passe</label><br>
                    <input type="password" name="pass" id="pwd" required>
                </div>
                    
                <br>
                <div>
                    <label for="pass">Votre nouveau mot de passe</label><br>
                    <input type="password" name="newPass" id="pwd" required>
                </div>
                    
                <br>
                <div>
                    <label for="pass">Confirmez votre nouveau mot de passe</label><br>
                    <input type="password" name="newPassVerif" id="pwd" required>
                </div>
  
                <br>
                
                <button class="btn btn-lg btn-primary " type="submit" name="validatePwd" id="validatePwd">Validez</button>    
        </form>
      
  </body>
</html>