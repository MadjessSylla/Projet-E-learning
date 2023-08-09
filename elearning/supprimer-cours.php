<?php
  include("head.php");
  include("menu-ens.php");
  	 //
 //
if(isset($_GET["ic"]))
  $idc = $_GET["ic"] ;
 else
  $idc=0;
//
//

echo "<br/><br/><center>SUPPRESSION COURS</center><br/><br/>";
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
  $sql = "delete from cours where id_cours=:idco ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idco"=>$idc));
  //
  //
  if($exec)
  {
    echo '<center>Cours supprim&eacute;</center><br/>';
  }
  else
  {
    echo "<center>Échec de l'opération de suppression</center><br/>";
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




 ?>