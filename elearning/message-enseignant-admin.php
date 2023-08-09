<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-ens.php");
 //
 //Instanciation PDO
   $dsn = "mysql:host=localhost;dbname=e_learning";
   $user = "root";
   $pass = "";
?>
<div class="container"  style="margin-top:20px;width:50%;float:clear;">
<center style="font-weight:bold;font-size:13pt;color:white;">Message &agrave; l'administration</center><br> 
<form action="enregistrer-message-enseignant-admin.php" method="post" id="sendemail" enctype="multipart/form-data">
<br/><left style="color: white;"  >Objet<input type="text" required class='form-control'  name="objet" id="objet" size="58">
<br/>Message<textarea wrap="virtual" name="message" id="message" rows="3" cols="60" required class='form-control'></textarea>
<br/>Pi&egrave;ce jointe<input TYPE="file" name="fichier" id="fichier" SIZE="30" onChange="choixfichier">
<br/><input type="submit" class="btn-primary" value="Envoyer" style="margin-left:45%;" />
           
</form>
</div>
<?php
 include("footer.php");
//}
?>
