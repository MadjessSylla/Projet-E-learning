<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-ens.php");
?>
  <div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
    
<?php
  //
  
//include("strlib.php");
function corriger_chaine($ch)
 {
  $ch=str_replace("é","e",$ch);
  $ch=str_replace("è","e",$ch);
  $ch=str_replace("ê","e",$ch);
  $ch=str_replace("à","a",$ch);
  $ch=str_replace("â","a",$ch);
  $ch=str_replace("'"," ",$ch);
  $ch=str_replace("ç","c",$ch);
  $ch=str_replace("ù","u",$ch);
  $ch=str_replace("û","u",$ch);
  $ch=str_replace("ô","o",$ch);
  $ch=str_replace("ö","o",$ch);
  $ch=str_replace("ï","i",$ch);
  $ch=str_replace("î","i",$ch);
  
  //
  return($ch);
 }
//
 //
if(isset($_POST["objet"]))
  $obj = $_POST["objet"] ;
 else
  $obj="";
//
if(isset($_POST["message"]))
  $msg = $_POST["message"] ;
 else
  $msg="";
//
if(isset($_POST["id_etudiant"]))
  $idet = $_POST["id_etudiant"] ;
 else
  $idet=0;
//
//  
 // PIECE JOINTE 1 //
  $fichier1=$_FILES['fichier']['name'];
  //
   // echo "Fichier 1 : $fichier1 <br/>";
  //
  //
  $fichier1=corriger_chaine($fichier1);
  //
  $f1=$_FILES['fichier']['tmp_name'];
  if($fichier1=="")
    $nom_fichier="";
  else
   {   
    $nom_fichier="pieces_jointes/".$fichier1;
    $resultat = move_uploaded_file($_FILES['fichier']['tmp_name'],$nom_fichier);
   }
//
//
  $ida=$_SESSION["iduser_enseignant"];
  //
//
echo "<br/><br/><center>ENREGISTREMENT MESSAGE AUX ETUDIANTS</center><br/><br/>";
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
  $date = date("Y-m-d");
  
  //
  // echo "Date : $date ** Objet : $obj ** Message : $msg ** Id Etudiant : $idet<br/>";
  //
  $sql = "INSERT INTO message(date,objet,message,id_expediteur,type_expediteur,id_destinataire,type_destinataire,piece_jointe)
  VALUES (:dat,:ob,:mes,:ide,:typex,:idd,:typed,:pj)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":dat"=>$date,":ob"=>$obj,":mes"=>$msg,":ide"=>$ida,":typex"=>"ENS",
  ":idd"=>$idet,":typed"=>"ETU",":pj"=>$fichier1));
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