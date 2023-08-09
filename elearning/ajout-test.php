<?php
  include("head.php");
  include("menu-ens.php");
  
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
		<h4 style="text-align:center;">AJOUT TEST</h4>
		<form action="enregistrement-test.php" method="POST">
		Titre du Test:<input type="varchar"  class="form-control" name="ntest"  />
		<?php
               //include("connexion.php");
               //
			   //Connexion à la base de données avec PDO
               //Instanciation PDO
               $dsn = "mysql:host=localhost;dbname=e_learning";
               $user = "root";
               $pass = "";
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
                // COURS
               //
                $res=$pdo->query("select * from cours order by id_cours");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "Cours:";
                echo "<select required class='form-control' name='id_cours' >";
                echo "<option value=''>Choisir un cours</option>";
                foreach($res as $ligne)
                {
                  $titre = $ligne["titre_du_cours"];

                  $idc = $ligne["id_cours"];
          //
          if($idc==$titre)
            $select = "selected";
            else
            $select = "";
            //
                  echo "<option value=".$idc." $select>".$titre."</option>";
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
		

		<input type="submit" value="Valider" class="btn btn-primary"/>
		</form>

		
	</div>
<?php
  include("footer.php");
?>