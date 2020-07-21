<?php
require 'src/config/config.php';
require 'src/models/connect.php';

$db=connection();

if(isset($_GET['idcategorie'])){
    $id = htmlspecialchars(trim($_GET['idcategorie']));
} else {
    $id = '';
}

$sqlSelectCategorie="SELECT * FROM categorie WHERE idcategorie = :ids";
$reqSelectCategorie=$db->prepare($sqlSelectCategorie);
$reqSelectCategorie->bindParam(':ids', $id);
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
  
  <title>category add</title>
  </head>
<body>
        
        <h2>Add category</h2>
        <?php 
            $id = $reqSelectCategorie->fetchObject();           
         ?>
        
        <form action="category-base.php" method="post">
        
                <label for="">category</label>
                <input type="text" name="nom">
                <input class="invisible" type="text" name="idcategorie" placeholder="quantite" value="<?php echo $id->idcategorie ?>"/>
                <button class="">Save</button>
                
        </form>

</body>
</html>