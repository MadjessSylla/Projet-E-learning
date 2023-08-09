<?php session_start();
  include("head.php");
  include("menu-ens.php");
  	   //
		//
		 $idt = $_SESSION["id_test_encours"];
		 $titre = $_SESSION["titre_test_encours"];
		//
		 $iduser = $_SESSION["iduser_etudiant"];
		 //
		 //Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
			 $ctr=0;
			 $idet =0;
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               // MODULES
               //
               $res = $pdo->prepare("select * from etudiant where id_user=? ") ;
               $res->setFetchMode(PDO::FETCH_ASSOC) ;
               $res->bindValue(1, $iduser) ;
               $res->execute();
				foreach($res as $ligne)
                {
                	$idet = $ligne["id_etudiant"];
                	// echo "Code Etudiant : $idet<br/>";
                	
                }
               //
               
	$count=0;	 
		 
	//
	foreach ($_POST["idrep"] as $cle => $valeur)
    {
      $idr = $valeur;
	  //echo "Clé : $cle<br/>";
	  if(isset($_POST['coche'][$cle]))
	  {
	   $coche = $_POST['coche'][$cle];
	   if($coche>=1)
	   {
	    $idr=$coche ;
		$existe = false;
		 // echo "IDREP : $idr ** Coche : $coche<br/>";
		   $res2 = $pdo->prepare("select * from choix where id_etudiant=? and id_reponse=? ") ;
           $res2->setFetchMode(PDO::FETCH_ASSOC) ;
           $res2->bindValue(1, $idet) ;
           $res2->bindValue(2, $idr) ;
           $res2->execute();
		   foreach($res2 as $ligne2)
            {
             $idetud = $ligne2["id_etudiant"];
             $idrep = $ligne2["id_reponse"];
			 echo "Cette réponse existe déjà!<br/>";
            }
         //
		 //
		if($existe)
	    {
		  $sql = "delete from choix where id_etudiant=:ide and id_reponse=:idre";
          $res3 = $pdo->prepare($sql);
          $exec = $res3->execute(array(":ide"=>$idet,":idre"=>$idr));
          //	
		}
		//
		  $sql = "insert into choix(id_etudiant,id_reponse) VALUES (:ide,:idre)";
          $res = $pdo->prepare($sql);
          $exec = $res->execute(array(":ide"=>$idet,":idre"=>$idr));
          //
          if($exec)
          {
		   //header("location:passer-test.php");
		   $count++;
          }
	    //
 
	   }	
      }	  
	 }
     //
       $dbh = null ; 
      //
    }
    catch(PDOException $e)
    {
      echo "Erreur : ".$e->getMessage()."</br>";
    }
 //
 //
 if($count>0)
  header("location:passer-test.php");
 else
  header("location:afficher-test-etud.php");
//
 //
  include("footer.php");
?>