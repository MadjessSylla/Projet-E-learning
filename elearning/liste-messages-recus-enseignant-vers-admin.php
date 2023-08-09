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
echo "<br/><br/><center style='font-weight:bold;font-size:13pt;color:white;'>LISTE DES MESSAGES RECUS DES ENSEIGNANTS</center><br/><br/>";
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
               $res=$pdo->query("select m.*,e.nom_enseignant,e.prenom_enseignant from message m, enseignant e where 
                                e.id_user=m.id_expediteur and m.type_expediteur like 'ens%' and m.type_destinataire like 'adm%'  order by date desc;");
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
			     $ctr=0;
			   //
                foreach($res as $ligne)
                {
                	$nompren = $ligne["nom_enseignant"]." ".$ligne["prenom_enseignant"];
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