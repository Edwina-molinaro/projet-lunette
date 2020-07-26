<?php 
require 'src/config/config.php';
require 'src/models/connect.php';


if (isset($_GET['nom'])){
    $nom=htmlspecialchars(trim($_GET['nom']));
} else {
    $nom = '';
}

$db = connection();



$delete= $db->prepare('DELETE FROM categorie WHERE nom = :nom');
$delete->bindParam(':nom', $nom);
$delete->execute();
if ($delete->rowCount() == 1){
    header('Location: panel-admin.php');
} else {
    echo 'requete KO';
}

