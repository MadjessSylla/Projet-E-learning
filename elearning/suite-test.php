<?php session_start();
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
		//
		 $idt = $_SESSION["id_test_encours"];
		 $titre = $_SESSION["titre_test_encours"];
		 
		//
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;">
		<h4 style="text-align:center;">SUITE DU TEST : <?php echo $titre; ?></h4>
		<br/> 
		 <form method="POST" action="enregistrer-reponse-etudiant.php" >    
         <?php
		 
		 ?>
	     </form>
	</div>
<?php
  include("footer.php");
?>