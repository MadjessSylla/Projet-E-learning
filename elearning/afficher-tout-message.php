<?php session_start();
if(isset($_SESSION['id_userpers']))
 $idu=$_SESSION['id_userpers'];
else
 $idu=0;
//
if(isset($_GET['idm']))
  $idm=$_GET['idm'];
else
  $idm=0;
//
 //
 //
include("strlib.php");
//
//
$date=date('Y-m-d');
//
if($idm==0)
{
  header("location:logform-user.php");
  //
}
else
{
 include("connexion.php");
 //
 include("haut.php");
 //
 //
  $typexp="";
  $typdest="";
  $idpexp=0;
  $iddest=0;
  $idvi=0;
//
 $sqt="select * from message where id_message=$idm";
 $rpt=mysql_query($sqt) or die($sqt." ==> ".mysql_error());
 if(mysql_num_rows($rpt)>0)
 {
  $ligt=mysql_fetch_array($rpt);
  $typexp=$ligt['type_expediteur'];
  $typdest=$ligt['type_destinataire'];
  $idpexp=$ligt['id_expediteur'];
  $iddest=$ligt['id_destinataire'];
  //
  if(strtoupper(substr(trim($typexp),0,4))=="ETUD")
  {
    $idvi=$idpexp;
  }
  else
  if(strtoupper(substr(trim($typdest),0,4))=="ETUD")
  {
   $idvi=$iddest;
  }
 }
 //
 //
  $sqins="insert into lecture_message(id_message,id_lecteur,categorie_lecteur) values($idm,$idu,'personnel')";
  $repins=mysql_query($sqins);
 //
 //
  $squp="update message set nombre_lecture=(nombre_lecture+1) where id_message=$idm ";
  $repup=mysql_query($squp);// or die($squp.' : '.mysql_error());
 //
   $sqlm1="select * from message where id_message=$idm ";
	$repm1=mysql_query($sqlm1); // or die($sqlrep.' : '.mysql_error());
	$ligm1=mysql_fetch_array($repm1);
	//
	 $datem1=$ligm1['date'];
      $an=substr($datem1,0,4);
      $mo=substr($datem1,5,2);
      $jo=substr($datem1,8,2);
     $datem1=$jo."/".$mo."/".$an;
   //
   $idm1=$ligm1['id_message'];
   $idexp=$ligm1['id_expediteur'];
   $iddest=$ligm1['id_destinataire'];
   $typexp=$ligm1['type_expediteur'];
   $typdest=$ligm1['type_destinataire'];
   //
   if(strtoupper(substr(trim($typdest),0,4))=="ADMI")
   {
    $titre="Administration";
   }
   else
   if(strtoupper(substr(trim($typdest),0,4))=="VISI")
   {
    $titre="Etudiant";
   }
   //
   
   $objm1=html_entity_decode ($ligm1['objet']);
   $mesm1=html_entity_decode ($ligm1['message']);
   //
   $pjm1= html_entity_decode ($ligm1['piece_jointe1']);
    $pjm1= corriger_chaine($pjm1);
   //
   $pjm2= html_entity_decode ($ligm1['piece_jointe2']);
    $pjm2= corriger_chaine($pjm2);
   //
   $pjm3= html_entity_decode ($ligm1['piece_jointe3']);
    $pjm3= corriger_chaine($pjm3);
   //
   $pjm4= html_entity_decode ($ligm1['piece_jointe4']);
    $pjm4= corriger_chaine($pjm4);
   //
   $pjm5= html_entity_decode ($ligm1['piece_jointe5']);
    $pjm5= corriger_chaine($pjm5);
   //
   if(strtoupper(substr(trim($typexp),0,4))=="ADMI")
   {
    $url_pjm1= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm1);
    $url_pjm2= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm2);
    $url_pjm3= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm3);
    $url_pjm4= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm4);
    $url_pjm5= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm5);
  }
  else
  if(strtoupper(substr(trim($typexp),0,4))=="PERS")
   {
    $url_pjm1= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm1);
    $url_pjm2= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm2);
    $url_pjm3= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm3);
    $url_pjm4= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm4);
    $url_pjm5= "http://esad-tunis.net/espace-personnel/pieces_jointes/".htmlentities($pjm5);
  }
  else
  if(strtoupper(substr(trim($typexp),0,4))=="ETUD")
  {
   $url_pjm1= "http://esad-tunis.net/espace-etudiant/pieces_jointes/".htmlentities($pjm1);
   $url_pjm2= "http://esad-tunis.net/espace-etudiant/pieces_jointes/".htmlentities($pjm2);
   $url_pjm3= "http://esad-tunis.net/espace-etudiant/pieces_jointes/".htmlentities($pjm3);
   $url_pjm4= "http://esad-tunis.net/espace-etudiant/pieces_jointes/".htmlentities($pjm4);
   $url_pjm5= "http://esad-tunis.net/espace-etudiant/pieces_jointes/".htmlentities($pjm5);
  }
  if(strtoupper(substr(trim($typexp),0,4))=="PARE")
  {
   $url_pjm1= "http://esad-tunis.net/espace-parent/pieces_jointes/".htmlentities($pjm1);
   $url_pjm2= "http://esad-tunis.net/espace-parent/pieces_jointes/".htmlentities($pjm2);
   $url_pjm3= "http://esad-tunis.net/espace-parent/pieces_jointes/".htmlentities($pjm3);
   $url_pjm4= "http://esad-tunis.net/espace-parent/pieces_jointes/".htmlentities($pjm4);
   $url_pjm5= "http://esad-tunis.net/espace-parent/pieces_jointes/".htmlentities($pjm5);
  }
 //
 //
 ?>
<br/>
<center style="font-weight:bold;font-size:13pt;color:#069;">Affichage du message</center><br>
<hr width="90%" align="center" />
<br/> 
<table border="0">

 <?php
 // 
 echo "<tr bgcolor='#DEDEDE'><td>Date</td>
                               <td align='center'>
							     $datem1
								 <span style='width:100px;height:20px;background-color:$bgcolor;color:$frcolor;margin-top:5px;margin-bottom:5px;font-weight:bold;margin-left:100px;'><input  style='width:100px;height:20px;background-color:$bgcolor;color:$frcolor;margin-top:5px;margin-bottom:5px;font-weight:bold;height:30px;' type='text' id='qualification' value='$txtqual' readonly='readonly' onmouseover='javascript:popup3()' /></span>
							   </td></tr>";
   //echo "<tr><td colspan='2'>&nbsp;</td></tr>";
   echo "<tr bgcolor='#FFFFFF'><td>Objet</td><td align='center'>$objm1</td></tr>";
   //echo "<tr><td colspan='2'>&nbsp;</td></tr>";
   echo "<tr bgcolor='#DEDEDE'><td colspan='2'>
        <div class='cadre_message1'>";
   echo "$mesm1";
   //
   //
  echo "</td></tr>";
   //echo "<tr><td colspan='2'>&nbsp;</td></tr>";
  if(strlen($pjm1)>0)
   echo "<tr bgcolor='#FFFFFF'><td>Pi&egrave;ce jointe1</td><td align='left'><a href='$url_pjm1'>$pjm1</a></td></tr>";
  if(strlen($pjm2)>0)
   echo "<tr bgcolor='#FFFFFF'><td>Pi&egrave;ce jointe2</td><td align='left'><a href='$url_pjm2'>$pjm2</a></td></tr>";
  if(strlen($pjm3)>0)
   echo "<tr bgcolor='#FFFFFF'><td>Pi&egrave;ce jointe3</td><td align='left'><a href='$url_pjm3'>$pjm3</a></td></tr>";
  if(strlen($pjm4)>0)
   echo "<tr bgcolor='#FFFFFF'><td>Pi&egrave;ce jointe4</td><td align='left'><a href='$url_pjm4'>$pjm4</a></td></tr>";
  if(strlen($pjm5)>0)
   echo "<tr bgcolor='#FFFFFF'><td>Pi&egrave;ce jointe5</td><td align='left'><a href='$url_pjm5'>$pjm5</a></td></tr>";
   // 
  echo "</table>";
 //
$max=35;
$max -= $ctr;
for($i=0;$i<$max;$i++)
{
 echo "<br/>";
}
 //

 include("bas.php");
 }
?>