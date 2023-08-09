<?php
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
if(isset($_POST["titre"]))
  $titre = $_POST["titre"] ;
 else
  $titre="";
//
if(isset($_POST["description"]))
  $description = $_POST["description"] ;
 else
  $description="";
//
if(isset($_POST["chapitre"]))
  $chapitre = $_POST["chapitre"] ;
 else
  $chapitre="";
//
/*
if(isset($_POST["date"]))
  $date = $_POST["date"] ;
 else
  $date="";

//
if(isset($_POST["heure"]))
  $heure = $_POST["heure"] ;
 else
  $heure="";
*/
if(isset($_POST["id_module"]))
  $idmod = $_POST["id_module"] ;
 else
  $idmod="";
//
if(isset($_POST["id_enseignant"]))
  $idens = $_POST["id_enseignant"] ;
 else
  $idens="";
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
    $nom_fichier="upload_cours/".$fichier1;
    $resultat = move_uploaded_file($_FILES['fichier']['tmp_name'],$nom_fichier);
   }
//
 // echo "Fichier 1 : $fichier1 ** Nom_Fichier : $nom_fichier<br/><br/>";
// PIECE JOINTE 2 //
  $fichier2=$_FILES['fichier2']['name'];
  //
   // echo "Fichier 2 (1): $fichier2 <br/>";
   
   //$fichier2 = str_replace("é","e",$fichier2);
   $fichier2=corriger_chaine($fichier2);
    // echo "Fichier 2 (2): $fichier2 <br/>";
  //
  //
  $f2=$_FILES['fichier2']['tmp_name'];
  if($fichier2=="")
    $nom_fichier2="";
  else
   {   
    $nom_fichier2="upload_cours/".$fichier2;
    $resultat2 = move_uploaded_file($_FILES['fichier2']['tmp_name'],$nom_fichier2);
   }
//
//
 // echo "Fichier 2 : $fichier2 ** Nom_Fichier2 : $nom_fichier2<br/>";
//
//
echo "<br/><br/><center>ENREGISTREMENT COURS</center><br/><br/>";
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
  $sql = "INSERT INTO cours(id_enseignant,titre_du_cours,description, id_module,fichier1,fichier2) VALUES (:ide,:titre,:description,:idm,:fic1,:fic2)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":ide"=>$idens,":titre"=>$titre,":description"=>$description,":idm"=>$idmod,":fic1"=>$fichier1,":fic2"=>$fichier2));
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