<?php
//
 function corriger_chaine($ch)
 {
  $ch=str_replace("�","e",$ch);
  $ch=str_replace("�","e",$ch);
  $ch=str_replace("�","e",$ch);
  $ch=str_replace("�","a",$ch);
  $ch=str_replace("�","a",$ch);
  $ch=str_replace("'"," ",$ch);
  $ch=str_replace("�","c",$ch);
  $ch=str_replace("�","u",$ch);
  $ch=str_replace("�","u",$ch);
  $ch=str_replace("�","o",$ch);
  $ch=str_replace("�","o",$ch);
  $ch=str_replace("�","i",$ch);
  $ch=str_replace("�","i",$ch);
  
  //
  return($ch);
 }

//

?>