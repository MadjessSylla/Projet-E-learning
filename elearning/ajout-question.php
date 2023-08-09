<?php
  include("head.php");
  include("menu-ens.php");
  
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
		<h4 style="text-align:center;">Ajouter une question au Test</h4>
		<form action="enregistrement-question.php" method="POST">
		<?php
               //include("connexion.php");
               //
			   //Connexion à la base de données avec PDO
               //Instanciation PDO
               $dsn = "mysql:host=localhost;dbname=e_learning";
               $user = "root";
               $pass = "";
               //
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               // Test
               //
                $res=$pdo->query("select * from test order by id_test");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "Test:";
                echo "<select required class='form-control' name='id_test' >";
                echo "<option value=''>Choisir un test</option>";

                foreach($res as $ligne)
                {
                	$ntest = $ligne["titre_du_test"];
                	$idt = $ligne["id_test"];
                	 //
          if($idt==$ntest)
            $select = "selected";
            else
            $select = "";
                	 echo "<option value=".$idt." $select>".$ntest."</option>";

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
		libelle Question:<input type="varchar" required  class="form-control" name="lquest"  />
		<br/>
		Numero Question:<input type="int" required  class="form-control" name="num"/>
		<br/>
		Bareme Question:<input type="int" class="form-control" name="barem" />

			
		
		
		<br/>
		<input type="submit" style="margin-left:45%;" value="Valider" class="btn btn-primary"/>

		</form>
		
	</div>
<?php
  include("footer.php");
?>