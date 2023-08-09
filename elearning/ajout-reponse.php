<?php
  include("head.php");
  include("menu-ens.php");
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
		<h4 style="text-align:center;">Saisie r&eacute;ponse/question du Test : <?php echo $titre; ?></h4>
		<br/> 
		<h4 style="text-align:center;"></h4>
		<br/>
		<form action="enregistrement-reponse.php" method="POST">
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
               // Question
               //
       		   $res = $pdo->prepare("select * from question where id_test=? order by id_question") ;
               $res->setFetchMode(PDO::FETCH_ASSOC) ;
               $res->bindValue(1, $idt) ;
               $res->execute();
                echo "question:";
                echo "<select required class='form-control' name='id_question' >";
                echo "<option value=''>Choisir une question</option>";
                foreach($res as $ligne)
                {
                	$lquest = $ligne["libelle_question"];
                	$idq = $ligne["id_question"];

            if($idq==$lquest)
            $select = "selected";
            else
            $select = "";
                	 echo "<option value=".$idq." $select>".$lquest."</option>";

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
		Numero Reponse (a,b,c...):<input type="varchar" required  class="form-control" name="numero_reponse"  />
		<br/>
		libelle Reponse:<input type="varchar" required  class="form-control" name="libelle_reponse"  />
		<br/>
		Bareme Reponses:<input type="int"  class="form-control" name="bareme_reponse" />

			
		
        <br/>
		<input type="hidden" name="id_test" value="<?php echo $idt;?>" />
		<input type="hidden" name="titre_test" value="<?php echo $titre;?>" />
		<input type="submit" style="margin-left:45%;" value="Valider" class="btn btn-primary"/>
		</form>



		</form>
		
	</div>
<?php
  include("footer.php");
?>