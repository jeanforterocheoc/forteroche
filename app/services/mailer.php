<?php
namespace App\Services;

class Mailer
{
  /**
  * Envoi un mail à l'auteur(formulaire contact)
  */
  public function sendMailAuthor($pseudo, $email, $messageUser)
  {
      ini_set('SMTP', 'smtp.free.fr');
      ini_set('sendmail_from', 'ocphpyb@gmail.com');
      $mail = 'jeanforte49@gmail.com';
      $sujet = 'Message pour Jean Forteroche' ;
      $message = 'De: '.$pseudo.' Email: '.$email.' Voici le message : '.$messageUser.'
  ';
  
      mail($mail, $sujet, $message);
  }

  /**
  * Envoi d'un mail à l'utilisateur avec le code de vérification
  */
  public function sendMail($recup_code)
  {
    ini_set('SMTP', 'smtp.free.fr');
    ini_set('sendmail_from', 'ocphpyb@gmail.com');
    $mail = 'jeanforte49@gmail.com';
    $sujet = 'Récupération de mot de passe';
    $message = 'Voici votre code de récupération : '.$recup_code.'
    ';
    
    mail($mail, $sujet, $message);
  }
}