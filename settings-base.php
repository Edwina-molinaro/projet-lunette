<?php
require 'src/config/config.php';
require 'src/models/connect.php';

//  insertion de l'utilisateur et de son pass hashé
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

//$pass_hash = password_hash($pass, PASSWORD_BCRYPT);
$password_hash = hash('sha512', $motdepasse);


$db = connection();

$sqlUpdateUser= "UPDATE user SET pseudo = :pseudo, motdepasse = :motdepasse";
$reqUpdateUser= $db->prepare($sqlUpdateUser);
$reqUpdateUser->bindParam(':pseudo', $pseudo);
$reqUpdateUser->bindParam(':motdepasse', $password_hash);
$reqUpdateUser->execute();

if ($reqUpdateUser->rowCount() == 1){
    header('Location: admin-panel.php');
} else {
    echo 'requete KO';
}
