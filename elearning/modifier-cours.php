<html>
<head>
  <title>Elearning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<h3>Modifier un cours</h3>
		<form action="enregistrement-modif-cours.php" method="POST" enctype="multipart/form-data">
		    
       <?php
 
          //
          if(isset($_GET["ic"]))
            $idc = $_GET["ic"] ;
          else
            $idc=0;
          //
            //include("connexion.php");
            //
			//Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
			 //
			 $iden = 0 ;
             $titre = "";
             $desc = "";
             $idm = 0;
			 //
			  $fichier1="";
			  $fichier2="";
			  $link_fichier1="";
			  $link_fichier2="";
		     //
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
			   
			   //
               $res1 = $pdo->prepare("select * from cours where id_cours=? ") ;
               $res1->setFetchMode(PDO::FETCH_ASSOC) ;
               $res1->bindValue(1, $idc) ;
               $res1->execute();
				foreach($res1 as $ligne1)
                {
                	$iden = $ligne1["id_enseignant"];
                	$titre = $ligne1["titre_du_cours"];
                	$desc = $ligne1["description"];
                	$idm = $ligne1["id_module"];
					//
			         $fichier1 = $ligne1["fichier1"];
			         $fichier2 = $ligne1["fichier2"];
			         $link_fichier1 = "./upload_cours/".$fichier1;
			         $link_fichier2 = "./upload_cours/".$fichier2;
		            //
          
                }
				//
				echo "Titre du cours:<input type='text' value='$titre' required  class='form-control' name='titre'  />";
		        echo "Description:<input type='varchar' value='$desc'  class='form-control' name='description'/>";
				echo "<input type='hidden' name='id_cours' id='id_cours' value='$idc' />";
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
					//
					if($idmod==$idm)
					  $select = "selected";
				    else
					  $select = "";
				    //
                	echo "<option value=".$idmod." $select>".$mod."</option>";
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
					//
					if($idens==$iden)
					  $select = "selected";
				    else
					  $select = "";
				    //
                	echo "<option value=".$idens." $select>".$nompren."</option>";
                }
               echo "</select>";
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
             ?>
		
        <br/>Joindre un support de cours(1)</b><input TYPE="file" name="fichier" id="fichier" SIZE="30" style="width:40%;display:inline;" class="form-control" />
		Fichier actuel : <a href="<?php echo $link_fichier1; ?>" target="_blank"><?php echo $fichier1; ?></a>
		<br/>Joindre un support de cours(2)</b><input TYPE="file" name="fichier2" id="fichier2" SIZE="30" style="width:40%;display:inline;" class="form-control" />
		Fichier actuel : <a href="<?php echo $link_fichier2; ?>" target="_blank"><?php echo $fichier2; ?></a>
		<br/><br/><input type="submit" class="btn btn-primary"/>
		</form>
		
	</div>
</body>
</html>