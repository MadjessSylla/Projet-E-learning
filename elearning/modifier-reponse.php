<?php
  include("head.php");
  include("menu-ens.php");
  	 //
          if(isset($_GET["ir"]))
            $idr = $_GET["ir"] ;
          else
            $idr=0;
          //
		  if(isset($_GET["re"]))
            $reponse = $_GET["re"] ;
          else
            $reponse="";
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;">
		<h4 style="text-align:center;">Modification de la r&eacute;ponse : <br/><br/><span style="color:#009;"><?php echo $reponse; ?></span></h4>
		<a href="supprimer-reponse.php?ir=<?php echo $idr; ?>" style="margin-left:60%;color:#e00;">Supprimer cette r&eacute;ponse</a>
		<br/> 
	
    <form action="enregistrement-modif-reponse.php" method="POST">
        
       <?php
 
          //
          if(isset($_GET["ir"]))
            $idr = $_GET["ir"] ;
          else
            $idr=0;
          //
            //include("connexion.php");
            //
      //Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
       //
             $lrep = "";
             $rep = "";
             $idq = 0;
       //
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
         
         //
               $res1 = $pdo->prepare("select * from reponse where id_reponse=? ") ;
               $res1->setFetchMode(PDO::FETCH_ASSOC) ;
               $res1->bindValue(1, $idr) ;
               $res1->execute();
        foreach($res1 as $ligne1)
                {
                  $idq = $ligne1["id_question"];
                  $lrep = $ligne1["libelle_reponse"];
                  $rep = $ligne1["bareme_reponse"];


                }
        //
        echo "Libelle reponse:<input type='varchar' value='$lrep' required  class='form-control' name='libelle_reponse'  />";
            echo "Bareme reponse:<input type='int' value='$rep'  class='form-control' name='bareme_reponse'/>";
        echo "<input type='hidden' name='id_reponse' id='id_reponse' value='$idr' />";
              
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
</body>
</html>