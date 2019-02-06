  <section class="my-5 contactAuthor">
    <div class="jumbotron bg-black">
      <h2 class="h1-responsive font-weight-bold text-center my-5">Contact</h2>
      <p class="text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
        eum porro a pariatur veniam.</p>
      <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
          <form action="posts/contactAuthor" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" class="form-control" name="pseudo" id="pseudo" required>
                  <label for="pseudo">Pseudo</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="email" class="form-control" name="email" id="email" required>                
                  <label for="email">Email</label>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea type="text" name="messageUser" id="messageUser" class="form-control md-textarea" rows="3"></textarea>
                  <label for="messageUser">Votre message</label>
                </div>
              </div>
            </div> 
            <div class="text-center text-md-left">
            <button type="submit" class="btn btn-primary submit-messageUser">Envoyer</button>
          </div>
          </form>
        </div>
      
        <div class="col-md-3 text-center">
          <ul class="list-unstyled mb-0">
            <li>
              <i class="fas fa-map-marker-alt fa-2x blue-text"></i>
              <p>12 rue du livre 75000 Paris</p>
            </li>
            <li>
              <i class="fas fa-envelope fa-2x mt-4 blue-text"></i>
              <p class="mb-0">jeanforte49@gmail.com</p>
            </li>
          </ul>
        </div>
      </div><!-- row-->
    </div> <!--jumbotron-->
  </section>

  
