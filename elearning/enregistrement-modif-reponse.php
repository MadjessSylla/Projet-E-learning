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
if(isset($_POST["libelle_reponse"]))
  $lrep = $_POST["libelle_reponse"] ;
 else
  $lrep="";
//
if(isset($_POST["bareme_reponse"]))
  $rep = $_POST["bareme_reponse"] ;
 else
  $rep="";
//
if(isset($_POST["id_reponse"]))
  $idr = $_POST["id_reponse"] ;
 else
  $idr="";
//


echo "<br/><br/><center>ENREGISTREMENT MODIFICATION REPONSE</center><br/><br/>";
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
  $sql = "update reponse set libelle_reponse='$lrep',bareme_reponse='$rep' where id_reponse=:idr ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idr"=>$idr));
  //
  // vérifier si la requête d'insertion a réussi
  //
  if($exec)
  {
    echo '<center>Reponse modifi&eacute;</center><br/>';
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