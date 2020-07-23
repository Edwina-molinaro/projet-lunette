<?php
require 'src/config/config.php';
require 'src/models/connect.php';



if (isset($_POST['nom'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
} else {
    $nom = '';
}



$db = connection();

$sqlUpdateCategorie= "UPDATE categorie SET nom = :nom";
$reqUpdateCategorie= $db->prepare($sqlUpdateCategorie);
$reqUpdateCategorie->bindParam(':nom', $nom);
$reqUpdateCategorie->execute();

if ($reqUpdateCategorie->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}
