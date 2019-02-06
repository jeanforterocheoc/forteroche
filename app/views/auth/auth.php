<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>
<?php $this->title = 'Authentification'; ?> 
          <form class="form-signin" action="<?='auth/login'?>" method="post">
            <div class="text-center mb-4">
              <h1 class="h3 mb-3 font-weight-normal">Identifiants de connexion</h1>
            </div>
            
            <div class="form-label-group">
              <input type="text" class="form-control" name="username" id="username" placeholder="Pseudo" >
              <label for="username">Pseudo</label>
            </div>

            <div class="form-label-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" >
              <label for="password">Mot de passe</label>
            </div>

            <button class="btn btn-sm btn-primary loginAuth" type="submit" name="login" id="login">Se connecter</button>
            <p><a href="Password/forgetPass" class="forgetPassword">Mot de passe oublié</a></p>
            <p class="mt-5 mb-3 text-muted text-center copyrightYear">&copy;2019</p>
          </form> 
  
  

