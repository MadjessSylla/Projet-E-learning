<?php
  include("head.php");
  include("menu-ens.php");
  	 //
 //
if(isset($_GET["ir"]))
  $idr = $_GET["ir"] ;
 else
  $idr=0;
//
//

echo "<br/><br/><center>SUPPRESSION REPONSE</center><br/><br/>";
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
  $sql = "delete from reponse where id_reponse=:idr ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idr"=>$idr));
  //
  //
  if($exec)
  {
    echo '<center>Reponse supprim&eacute;</center><br/>';
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