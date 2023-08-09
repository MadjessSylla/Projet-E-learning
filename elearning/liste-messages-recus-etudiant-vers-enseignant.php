<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-ens.php");
//
//
  $id=$_SESSION["iduser_enseignant"];
//
//Connexion à la base de données avec PDO
//Instanciation PDO
$dsn = "mysql:host=localhost;dbname=e_learning";
$user = "root";
$pass = "";
//
$ida = 0 ;
try
              {
                 $pdo=new PDO($dsn,$user,$pass) ;
               //
			   // 
			   $iduser=0;
               //
               $res=$pdo->prepare("select * from enseignant where id_user= :par");
			   //	   
			   $res->bindParam(':par',$id,PDO::PARAM_INT);
			   $res->execute();
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
                foreach($res as $ligne)
                {       	
                	$ida = $ligne["id_enseignant"];
                }
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
//
echo "<br/><br/><center style='font-weight:bold;font-size:13pt;color:white;'>LISTE DES MESSAGES RECUS DES ETUDIANTS</center><br/><br/>";
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
			   
			   echo "<table style='width:780px;margin-left:15%;' class='table table-striped table-hover'>";
			   echo "<tr  style='font-weight:bold;font-size:10pt;color:#869;'>
			           <td align='center' width='50'>Num.</td>
			           <td align='center' width='80'>Date</td>
			           <td align='center' width='150'>Objet</td>
			           <td align='center' width='200'>Message</td>
			           <td align='center' width='150'>Enseignant</td>
			           <td align='center' width='150'>Pi&egrave;ce Jointe</td>
			   </tr>";
               //
               $res=$pdo->query("select m.*,e.nom_etudiant,e.prenom_etudiant from message m, etudiant e, user u where u.type_user like 'etu%' and u.id_user=e.id_user and u.id_user=m.id_expediteur and m.type_expediteur like 'etu%' and (m.id_destinataire=$ida or m.id_destinataire='-99')  order by m.date desc;");
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
			     $ctr=0;
			   //
                foreach($res as $ligne)
                {
                	$nompren = $ligne["nom_etudiant"]." ".$ligne["prenom_etudiant"];
                	$date = $ligne["date"];
					 $an=substr($date,0,4);
					 $mo=substr($date,5,2);
					 $jo=substr($date,8,2);
					 $datem = $jo."/".$mo."/".$an;
					//
                	$obj = $ligne["objet"];
                	$mes = $ligne["message"];
                	$pj = $ligne["piece_jointe"];
					if(strlen(trim($pj))>3)
					{
					 $pj = "pieces_jointes/".$pj;
					 $url="<a href='$pj' target='_blank'>Fichier joint</a>";
					}
				    else
					 $url="";
					//
					 $ctr++;
					//
                	echo "<tr>
					         <td>$ctr</td>
					         <td>$datem</td>
					         <td>$obj</td>
					         <td>$mes</td>
					         <td>$nompren</td>
					         <td>$url</td>
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