<?php
  include("head.php");
  include("menu-ens.php");
  	 //

 //
if(isset($_POST["id_question"]))
  $idq = $_POST["id_question"] ;
 else
  $idq="";
//
if(isset($_POST["lquest"]))
  $lquest = $_POST["lquest"] ;
 else
  $lquest="";
//
if(isset($_POST["num"]))
  $num = $_POST["num"] ;
 else
  $num="";
//
if(isset($_POST["barem"]))
  $barem = $_POST["barem"] ;
 else
  $barem="";

if(isset($_POST["id_test"]))
  $idt = $_POST["id_test"] ;
 else
  $idt="";
//

echo "<br/><br/><center>ENREGISTREMENT MODIFICATION QUESTION</center><br/><br/>";
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
  $sql = "update question set libelle_question='$lquest',numero_question='$num', bareme_question=$barem where id_question=:idq ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idq"=>$idq));
  //
  // vérifier si la requête d'insertion a réussi
  //
  if($exec)
  {
    echo '<center>Question modifi&eacute;</center><br/>';
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