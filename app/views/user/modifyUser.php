
<?php $this->title = 'Modifier votre profil'; ?>
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

<p><a href="user/userAdmin">Accueil administration</a></p><br>

  <body class="text-center">

    <form class="form-signin" action="" method="post" onSubmit="validate()">
      <div class="text-center mb-4">
        <h4 class="h3 mb-3 font-weight-normal">Modifiez votre profil</h4>
      </div>

      <div class="form-label-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="username" value="<?= $user->getUsername()?>" id="username" >
      </div>

      <div class="form-label-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" >
      </div>

      <div class="form-label-group">
        <label for="password">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" >
      </div>

       <div class="form-label-group">
        <label for="email">Adresse mail</label>
        <input type="email" class="form-control" name="email" value="<?= $user->getEmail()?>" id="email" >
      </div>

        <input type="hidden" name="id" value="<?= $user->getId()?>">
       <button class="btn btn-sm btn-primary " type="submit" name="changeProfile" id="changeProfile">Modifier le profil</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
  </body>
</html>
