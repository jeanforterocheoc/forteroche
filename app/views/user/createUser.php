<?php $this->title = 'Création d\'un profil utilisateur'; ?> 

<?php use App\Services\MessageFlash; ?>

<div class="text-center">
  <form class="form-signin" action="<?='user/createUser'?>" method="post">
    <div class="text-center mb-4">
      <?php MessageFlash::displayMsg()?>
      <h5 class="h3 mb-3 font-weight-normal">Création du profil utilisateur</h5>
    </div>
    
    <div class="form-label-group">
      <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" >
      <label for="username">Nom d'utilisateur</label>
    </div>

    <div class="form-label-group">
      <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-label-group">
      <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe">
      <label for="passwordConfirm">Confirmer le mot de passe</label>
    </div>

     <div class="form-label-group">
      <input type="email" class="form-control" name="email" id="email" placeholder="Adresse mail" >
      <label for="email">Adresse mail</label>
    </div>
    <button class="btn btn-sm btn-primary " type="submit" name="login" id="login">Créer profil</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy;2019</p>
  </form> 
</div> 

