<?php
  include("head.php");
  include("menu-ens.php");
  
?>

	<div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
		<h4 style="text-align:center;">AJOUT COURS</h4>
		<form action="enregistrement-cours.php" method="POST" enctype="multipart/form-data">
		Titre du cours:<input type="text" required  class="form-control" name="titre"  />
		Description:<input type="varchar"  class="form-control" name="description"/>
		
		
             
             <?php
               //include("connexion.php");
               //
			//Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               // MODULE
               //
                $res=$pdo->query("select * from module order by module");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "Module:";
                echo "<select required class='form-control' name='id_module' >";
                echo "<option value=''>Choisir un module</option>";
                foreach($res as $ligne)
                {
                	$mod = $ligne["module"];
                	$idmod = $ligne["id_module"];
                	echo "<option value=".$idmod.">".$mod."</option>";
                }
               echo "</select>";
               //
               // ENSEIGNANT
               //
               $res=$pdo->query("select * from enseignant order by nom_enseignant,prenom_enseignant");
                $res->setFetchMode(PDO::FETCH_ASSOC);
               echo "Enseignant:";
                echo "<select required class='form-control' name='id_enseignant' >";
                echo "<option value=''>Choisir un enseignant</option>";
                foreach($res as $ligne)
                {
                	$nompren = $ligne["nom_enseignant"]." ".$ligne["prenom_enseignant"];
                	$idens = $ligne["id_enseignant"];
                	echo "<option value=".$idens.">".$nompren."</option>";
                }
               echo "</select>";
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
             ?>
		
        <br/>Joindre un support de cours(1)</b><input TYPE="file" name="fichier" id="fichier" SIZE="30" style="width:50%;display:inline;" class="form-control" />
		<br/>Joindre un support de cours(2)</b><input TYPE="file" name="fichier2" id="fichier2" SIZE="30" style="width:50%;display:inline;" class="form-control" />
		<br/><br/><input type="submit" class="btn btn-primary"/>
		</form>
		
	</div>
<?php
  include("footer.php");
?>