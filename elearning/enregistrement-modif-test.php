<?php
  include("head.php");
  include("menu-ens.php");
  	 //
 
 //
if(isset($_POST["id_cours"]))
  $idc = $_POST["id_cours"] ;
 else
  $idc="";

//
if(isset($_POST["titre_du_test"]))
  $titre = $_POST["titre_du_test"] ;
 else
  $titre="";
//
if(isset($_POST["date_heure"]))
  $dateheure = $_POST["date_heure"] ;
 else
  $dateheure="";
//

if(isset($_POST["id_test"]))
  $idt = $_POST["id_test"] ;
 else
  $idt="";
//

echo "<br/><br/><center>ENREGISTREMENT MODIFICATION TEST</center><br/><br/>";
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
  $sql = "update test set titre_du_test='$titre',date_heure='$dateheure' where id_test=:idt ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idt"=>$idt));
  //
  // vérifier si la requête d'insertion a réussi
  //
  if($exec)
  {
    echo '<center>Test modifi&eacute;</center><br/>';
  }
  else
  {
    echo "<center>Échec de l'opération de modification</center><br/>";
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