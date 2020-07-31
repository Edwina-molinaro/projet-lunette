<?php 
require 'src/config/config.php';
require 'src/models/connect.php';



$idcategorie=$_COOKIE["cookieCategorie"];

$db = connection();


$delete= $db->prepare('DELETE FROM categorie WHERE idcategorie = :idcategorie');
$delete->bindParam(':idcategorie', $idcategorie);
$delete->execute();
if ($delete->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}

