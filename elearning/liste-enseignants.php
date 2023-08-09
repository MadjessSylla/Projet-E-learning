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
echo "<br/><br/><center style='font-weight:bold;font-size:13pt;color:white;'>LISTE DES ENSEIGNANTS INSCRITS</center><br/><br/>";
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
			   
			   echo "<table style='width:800px;margin-left:15%;' class='table table-striped table-hover'>";
			   echo "<tr  style='font-weight:bold;font-size:10pt;color:#869;'>
			           <td align='center' width='50'>Num.</td>
			           <td align='center' width='150'>Nom</td>
			           <td align='center' width='150'>Pr&eacute;nom</td>
			           <td align='center' width='50'>Sexe</td>
			           <td align='center' width='250'>Email</td>
			           <td align='center' width='150'>Module</td>
			   </tr>";
               //
               $res=$pdo->query("select * from enseignant order by nom_enseignant,prenom_enseignant;");
               $res->execute();
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
               //
			     $ctr=0;
			   //
                foreach($res as $ligne)
                {
                	$nom = $ligne["nom_enseignant"];
					$pren = $ligne["prenom_enseignant"];
                	$sexe = $ligne["sexe"];
                	$mail = $ligne["mail"];
                	$mod = $ligne["module"];
					//
					
					//
					 $ctr++;
					//
                	echo "<tr>
					         <td>$ctr</td>
					         <td>$nom</td>
					         <td>$pren</td>
					         <td>$sexe</td>
					         <td>$mail</td>
					         <td>$mod</td>
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