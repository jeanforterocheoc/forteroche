<?php $this->title = 'Vérification du mail'; ?> 

<?php use App\Services\Messages; ?>
<?php Messages::displayMsg()?>

<form action="" method='post'class="form-signin">
  <div class="text-center mb-4">
    <h4 class="h3 mb-3 font-weight-normal">Réinitialisation du mot de passe</h4>
    <p>Entrez votre adresse mail afin d'obtenir un code de vérification</p>
  </div>
  <div class="form-label-group">
    <input type="email" class="form-control" name="recupMail" id="recupMail" placeholder="Email">
    <label for="recupMail">Email</label>
  </div>
  <button class="btn btn-sm btn-primary " type="submit" name="recupSubmit">Validez</button>    
</form>
 