<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-admin.php");
 //
//
 if(isset($_POST["nom"]))
  $nom = $_POST["nom"] ;
 else
  $nom="";
//
if(isset($_POST["prenom"]))
  $pren = $_POST["prenom"] ;
 else
  $pren="";
//
if(isset($_POST["sexe"]))
  $sexe = $_POST["sexe"] ;
 else
  $sexe="";
//
if(isset($_POST["mail"]))
  $mail = $_POST["mail"] ;
 else
  $mail="";
//
if(isset($_POST["module"]))
  $mod = $_POST["module"] ;
 else
  $mod="";
//
if(isset($_POST["login"]))
  $log = $_POST["login"] ;
 else
  $log="";
//
if(isset($_POST["mdp"]))
  $mdp = $_POST["mdp"] ;
 else
  $mdp="";
//


//
echo "<br/><br/><center>ENREGISTREMENT ENSEIGNANT</center><br/><br/>";
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
  //
  $mdp = md5($mdp);
  //
  $sql = "INSERT INTO user(login, mot_de_passe,type_user) VALUES (:log,:pas,:tuser)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":log"=>$log,":pas"=>$mdp,":tuser"=>"ENS"));
  //
  $iduser=$pdo->lastInsertId();
  // echo "ID USER : $iduser<br/>";
  //
  $sql = "INSERT INTO enseignant(id_user,nom_enseignant, prenom_enseignant,mail,sexe,module) VALUES (:idu,:nom,:pren,:mail,:sexe,:mod)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":idu"=>$iduser,":pren"=>$pren,":nom"=>$nom,":mail"=>$mail,":sexe"=>$sexe,":mod"=>$mod));
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