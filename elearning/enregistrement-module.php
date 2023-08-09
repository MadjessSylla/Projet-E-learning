<?php
  include("head.php");
  include("menu-ens.php");
  
?>
<?php 
 //
    if(isset($_POST["mod"]))
      $mod = $_POST["mod"] ;
     else
      $mod="";

    ?>
  <div class="container"  style="color: white;">
    
<?php

//

     echo "<br/><br/><center>ENREGISTREMENT MODULE</center><br/><br/>";
//Connexion à la base de données avec PDO
//Instanciation PDO

    $dsn = "mysql:host=localhost;dbname=e_learning";
    $user = "root";
    $pass = "";
    try
    {
    $pdo=new PDO($dsn,$user,$pass) ; //DSN [, user [, pass [, options]]]);
 //
 
  // Requête mysql pour insérer des données
  //
  // echo "ID USER : $iduser<br/>";
  //
      $sql = "INSERT INTO module(module) VALUES (:mod)";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":mod"=>$mod));
  //
  // vérifier si la requête d'insertion a réussi
  //
      if($exec)
  {
    echo '<center>Données insérées</center><br/>';
  }
  else
  {
    echo "<center>Échec de l'opération d'insertion</center><br/>";
  }
  //
 //
 $dbh = null ; //Fin de connexion : $dbh=null ; ou unset($dbh) ;
}
catch (PDOException $e) 
{
  echo "Erreur: ".$e->getMessage()."<br/>" ;
  die() ;
}



include("footer.php");
 ?>