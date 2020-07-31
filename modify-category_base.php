<?php
require 'src/config/config.php';
require 'src/models/connect.php';
echo $_COOKIE["cookieCategorie"];



if (isset($_POST['nom'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
} else {
    $nom = '';
}

$idcategorie=$_COOKIE["cookieCategorie"];

// if (isset($_GET['idcategorie'])){
//     $idcategorie=htmlspecialchars(trim($_GET['idcategorie']));
// } else {
//     $idcategorie = '';
// }



$db = connection();
var_dump($idcategorie);
$sqlUpdateCategorie= "UPDATE categorie SET nom = :nom WHERE idcategorie = :idcategorie";
$reqUpdateCategorie= $db->prepare($sqlUpdateCategorie);
$reqUpdateCategorie->bindParam(':nom', $nom);
$reqUpdateCategorie->bindParam(':idcategorie', $idcategorie);
$reqUpdateCategorie->execute();

if ($reqUpdateCategorie->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}
