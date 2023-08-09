<?php
  include("head.php");
  include("menu-ens.php");
  	 //
          if(isset($_GET["it"]))
            $idt = $_GET["it"] ;
          else
            $idt=0;
          //
		  if(isset($_GET["te"]))
            $titre = $_GET["te"] ;
          else
            $titre="";
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
		<h4 style="text-align:center;">D&eacute;blocage du test : <?php echo $titre; ?></h4>
		<form action="enregistrer-deblocage-test.php" method="POST">
		<br/> 
		    
      <?php
            //
		
			//Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
			 $ctr=0;
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               //
                $res=$pdo->query("select * from etudiant order by nom_etudiant, prenom_etudiant");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "Etudiant : <select required class='form-control' name='id_etudiant' >";
                echo "<option value=''>Choisir un &eacute;tudiant</option>";

                foreach($res as $ligne)
                {
                	$nom = $ligne["nom_etudiant"];
                	$prenom = $ligne["prenom_etudiant"];
					$np = $nom." ".$prenom;
                	$idet = $ligne["id_etudiant"];
                	 //
                	 echo "<option value=".$idet.">".$np."</option>";

                }
               echo "</select>";
               //
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
            ?>
			<br/>
			<input type="hidden" name="id_test" id="id_test" value="<?php echo $idt; ?>" />
		<input type="submit" style="margin-left:45%;" value="Debloquer" class="btn btn-primary"/>

		</form>
		
	</div>
<?php
  include("footer.php");
?>