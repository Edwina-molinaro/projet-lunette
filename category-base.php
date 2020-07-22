<?php
require 'src/config/config.php';
require 'src/models/connect.php';

//  insertion de la categorie
if (isset($_POST['idcategorie'])){
    $id=htmlspecialchars(trim($_POST['idcategorie']));
} else {
    $id = '';
}

if (isset($_POST['nom'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
} else {
    $nom = '';
}

if (isset($_POST['user_idUser'])){
    $user_idUser=htmlspecialchars(trim($_POST['user_idUser']));
} else {
    $user_idUser = '';
}


$db = connection();

$sqlInsertCategory= 'insert INTO categorie (nom, user_idUser) VALUES (:nom, :user_idUser)';
$reqInsertCategorie= $db->prepare($sqlInsertCategory);
$reqInsertCategorie->bindParam(':nom', $nom);
$reqInsertCategorie->bindParam(':user_idUser', $user_idUser);
$reqInsertCategorie->execute();
if ($reqInsertCategorie->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}
