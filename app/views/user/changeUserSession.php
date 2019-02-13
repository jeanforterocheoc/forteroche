<?php $this->title = 'Modifier votre profil'; ?>

<?php use App\Services\Messages; ?>
<?php Messages::displayMsg()?>

<div class="text-center modProfil">
  <form class="form-signin " action="user/changeUserSession" method="post" >
    <div class="text-center mb-4">
      <h5 class="h3 mb-3 font-weight-normal"><?= $user->getUsername()?> ,voici vos informations </h5>
    </div>
    <div class="form-label-group">
      <input type="text" class="form-control" name="username" value="<?= $user->getUsername()?>" id="username">
      <label for="username">Nom d'utilisateur</label>
    </div>

    <div class="form-label-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
        <label for="password">Mot de passe</label>
    </div>
    
    <div class="form-label-group">
      <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmation du mot de passe">
      <label for="password">Confirmation du mot de passe</label>
    </div>

    <div class="form-label-group">
      <input type="email" class="form-control" name="email" value="<?= $user->getEmail()?>" id="email" placeholder="Adresse mail">
      <label for="email">Adresse mail</label>
    </div>

    <input type="hidden" name="id" value="<?= $user->getId()?>">
    <button class="btn btn-sm btn-primary " type="submit" name="changeProfile" id="changeProfile">Modifier mon profil</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy;2019</p>
  </form>
</div>
