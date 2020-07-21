<?php
require 'src/config/config.php';
require 'src/models/connect.php';

//  insertion de la categorie
if (isset($_POST['nom'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
} else {
    $nom = '';
}


$db = connection();

$sqlInsertCategory= 'insert INTO categorie (nom) VALUES (:nom)';
$reqInsertCategorie= $db->prepare($sqlInsertCategory);
$reqInsertCategorie->bindParam(':nom', $nom);
$reqInsertCategorie->execute();

if ($reqInsertCategorie->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}
