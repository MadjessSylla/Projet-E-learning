<?php session_start();
if(isset($_SESSION['id_userpers']))
 $idu=$_SESSION['id_userpers'];
else
 $idu=0;
//
 //
 //
include("strlib.php");
//
//
$date=date('Y-m-d');
//
if($idu==0)
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
 ?>
<br/>
<center style="font-weight:bold;font-size:13pt;color:#069;">Liste des messages re&ccedil;us des &eacute;tudiants</center><br>
<hr width="90%" align="center" />
<br/> 
<table border="0" style="margin-top:10px;">
  <tr bgcolor="#DEDEDE"><th width="70">Date</th><th width="450">Objet</th><th width="450">Message</th></tr>
 <?php
 // 
 $rqt0="select * from personnel where id=$idu";
 $rep0=mysql_query($rqt0);
 $lig0=mysql_fetch_array($rep0);
 $idserv=$lig0['id_service'];
 //
 $ctr=0;
 $sql="select * from message where type_expediteur='Etudiant' and id_destinataire=\"$idserv\" order by date desc; ";
  $rep=mysql_query($sql);
  //
  while($ligne=mysql_fetch_array($rep))
  {
   $ctr++;
   //
   $idm=$ligne['id_message'];
   $date=$ligne['date'];
   $an=substr($date,0,4);
   $mo=substr($date,5,2);
   $jo=substr($date,8,2);
   $date=$jo."/".$mo."/".$an;
   //
   $obj=html_entity_decode($ligne['objet']);
   $mes=html_entity_decode($ligne['message']);
   //
   if($ctr%2==0)
    $color="#DEDEDE";
   else
    $color="#FFFFFF";
   //
   echo "<tr bgcolor='$color'><td style='font-size:10pt;'>$date</td><td align='center'><a href='afficher-tout-message.php?idm=$idm' style='font-size:10pt;color:#00f;'>$obj</a></td><td align='center' style='font-size:9pt;'>$mes</td></tr>";
   //
  }
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