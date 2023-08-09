<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-admin.php");
//
//
  $ida=$_SESSION["iduser_admin"];
//
//
echo "<br/><br/><center style='font-weight:bold;font-size:13pt;color:white;'>LISTE DES ETUDIANTS INSCRITS</center><br/><br/>";
//Connexion à la base de données avec PDO
//Instanciation PDO
$dsn = "mysql:host=localhost;dbname=e_learning";
$user = "root";
$pass = "";
              try
              {
                 $pdo=new PDO($dsn,$user,$pass) ;
               //
			   // MESSAGES RECUS DES ENSEIGNANTS
			   //
			   
			   echo "<table style='width:850px;margin-left:15%;' class='table table-striped table-hover'>";
			   echo "<tr  style='font-weight:bold;font-size:10pt;color:#869;'>
			           <td align='center' width='50'>Num.</td>
			           <td align='center' width='150'>Nom</td>
			           <td align='center' width='150'>Pr&eacute;nom</td>
			           <td align='center' width='50'>Age</td>
			           <td align='center' width='50'>Sexe</td>
			           <td align='center' width='250'>Email</td>
			           <td align='center' width='150'>Fili&egrave;re</td>
			   </tr>";
               //
               $res=$pdo->query("select * from etudiant order by nom_etudiant,prenom_etudiant;");
               $res->execute();
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
               //
			     $ctr=0;
			   //
                foreach($res as $ligne)
                {
                	$nom = $ligne["nom_etudiant"];
					$pren = $ligne["prenom_etudiant"];
                	$age = $ligne["age"];
                	$sexe = $ligne["sexe"];
                	$mail = $ligne["mail"];
                	$fil = $ligne["filiere"];
					//
					 $ctr++;
					//
                	echo "<tr>
					         <td>$ctr</td>
					         <td>$nom</td>
					         <td>$pren</td>
					         <td>$age</td>
					         <td>$sexe</td>
					         <td>$mail</td>
					         <td>$fil</td>
					     </tr>
					
					";
                }
               echo "</table>";
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }



include("footer.php");
 ?>