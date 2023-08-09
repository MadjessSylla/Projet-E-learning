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
<center style="font-weight:bold;font-size:13pt;color:#069;">Message aux &eacute;tudiants</center><br> 
<form action="enregistrer-message-enseignant-etudiant.php" method="post" id="sendemail" enctype="multipart/form-data">

             <left style="color: white;"  >Etudiant<select required class='form-control' name='id_etudiant' >
                    <option value='-99' selected>Tous les &eacute;tudiants</option>
			<?php
			 //      
              try
              {
                 $pdo=new PDO($dsn,$user,$pass) ;
               //
			   // ENSEIGNANT
               //
               $res=$pdo->query("select * from etudiant order by nom_etudiant,prenom_etudiant");
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
                foreach($res as $ligne)
                {
                	$nompren = $ligne["nom_etudiant"]." ".$ligne["prenom_etudiant"];
                	$idet = $ligne["id_etudiant"];
                	echo "<option value=".$idet.">".$nompren."</option>";
                }
               echo "</select>";
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
			?>
				  </select>
				
<br/>Objet<input type="text" required class='form-control'  name="objet" id="objet" size="58" />
<br/>Message<textarea wrap="virtual" name="message" id="message" rows="3" cols="60" required class='form-control' ></textarea>
<br/>Pi&egrave;ce jointe<input TYPE="file" name="fichier" id="fichier" SIZE="30" onChange="choixfichier">
<br/><input type="submit" class="btn-primary" value="Envoyer" style="margin-left:45%;" />
           
</form>
</div>
<?php
 include("footer.php");
//}
?>
