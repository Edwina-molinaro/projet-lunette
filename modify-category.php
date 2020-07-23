<?php
session_start();
echo $_COOKIE["cookie"];
require 'src/config/config.php';
require 'src/models/connect.php';

$db=connection();

// if(isset($_GET['idcategorie'])){
//     $idcategorie = htmlspecialchars(trim($_GET['idcategorie']));
// } else {
//     $idcategorie = '';
// }
// var_dump($idcategorie);

$sqlSelectCategorie="SELECT * FROM categorie WHERE idcategorie = :idcategorie";
$reqSelectCategorie=$db->prepare($sqlSelectCategorie);
$reqSelectCategorie->bindParam(':idcategorie', $idcategorie);
$reqSelectCategorie->execute();

?>

<!DOCTYPE html>
<html amp >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo1.png" type="image/x-icon">
  <meta name="description" content="">
  <meta name="amp-script-src" content="">
  
  <title>category modify</title>
  </head>
<body>
        
        <h2>Modify category</h2>      
        <form action="modify-category_base.php" method="post">
        
                <label for="">category</label>
                <input type="text" name="nom">
                <button class="">Save</button>
                
        </form>

</body>
</html>