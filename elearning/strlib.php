<?php
//
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

?>