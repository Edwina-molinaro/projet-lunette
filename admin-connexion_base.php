<?php
session_start(); 
require 'src/config/config.php';
require 'src/models/connect.php';

//  récuperation de l'utilisateur et de son pass hashé
if (isset($_POST['pseudo'])){
    $pseudo=htmlspecialchars(trim($_POST['pseudo']));
} else {
    $pseudo = '';
}

if (isset($_POST['motdepasse'])){
    $motdepasse=htmlspecialchars(trim($_POST['motdepasse']));
} else {
    $motdepasse = '';
}

$db = connection();


//$pass_hash = password_hash($password, PASSWORD_BCRYPT);
$password_hash = hash('sha512', $password);


$sqlSelectUser='SELECT pseudo, motdepasse FROM user';
$reqSelectUser=$db->prepare($sqlSelectUser);
$reqSelectUser->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 45);
$reqSelectUser->execute();
$resultat=$reqSelectUser->fetchObject();

$isPasswordCorrect=hash_equals($password_hash, $resultat->password);

  if (!$resultat)
  {
      echo 'Mauvais identifiant ou mot de passe !';
  }
  else
  {
      if ($isPasswordCorrect) {
          session_start();
          header('location:admin-panel.php');
      }
      else {
          echo 'Mauvais identifiant ou mot de passe !';
      }
  }
