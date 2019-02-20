<?php $this->title = 'Code de vérification'; ?>

<?php use App\Services\MessageFlash; ?>
<?php MessageFlash::displayMsg()?>

<form action="" method='post'class="form-signin">
  <div class="text-center mb-4">
    <h4 class="h3 mb-3 font-weight-normal">Code de vérification</h4>
    <p>Entrez votre code reçu par mail</p>
  </div>
  <div class="form-label-group">
    <input type="text" class="form-control" name="checkCode" id="checkCode" placeholder="Code">
    <label for="checkCode">Code</label>
  </div>
  <button class="btn btn-primary " type="submit" name="checkSubmit">Envoyer</button>    
</form>
        



