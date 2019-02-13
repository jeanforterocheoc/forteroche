<?php $this->title = 'Espace d\'administration du site'; ?>

<div class="container">
 <div class="row">
  <div class="col-sm userAdminProfil">
    <img src="public/images/man.svg" alt="avatar d'un homme" height="100px" width="100px"> 
    <h4>Bienvenue, <?= $user->getUsername()?></h4>
    <p><a href="user/changeUserSession">Modifier votre profil</a></p>
    <p><a href="home/homepage" target="_blank">Voir le blog</a></p>
    <p><a href="auth/logout">Se déconnecter</a></p> 
  </div>
  <div class="col-sm chapterComment">
    <img src="public/images/book.svg" alt="dessin d'un livre" height="100px" width="100px"> 
    <h4>Les chapitres</h4>
    <p><a href="chapter/allChapters">Tous les chapitres</a></p>
    <p><a href="chapter/newChapter">Rédiger un nouveau chapitre</a></p>

    <h4>Les commentaires</h4>
    <p><a href="comment/allComments">L'ensemble des commentaires</a></p>

    <h4>Profil</h4>
    <p><a href="user/usersProfilesList">Liste des profils</a></p>
    <p><a href="user/createUser">Créer un profil</a></p>
  </div>
  
  <div class="col-sm number">
    <img src="public/images/report.svg" alt="dessin d'un rapport" height="100px" width="100px"> 
    <h4>Quelques chiffres !</h4>
    <p class='profilUser'><?= $profil ?> profil(s) enregistré(s).</p>
    <p class='nbChapter'>Le blog contient <?= $chapter ?> chapitre(s).</p>
    <p class='nbComments'>Au total, <?= $comments ?> commentaires ont été postés.</p>
    <p class='nbReport'> <?= $report ?> signalement(s).</p>
  </div>
 </div> <!-- row -->
</div> <!-- Container -->
