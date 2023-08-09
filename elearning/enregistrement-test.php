<?php
//
    if(isset($_POST["ntest"]))
      $ntest = $_POST["ntest"] ;
     else
      $ntest="";

    if(isset($_POST["id_cours"]))
      $idcours = $_POST["id_cours"] ;
     else
    $idcours="";

//
// echo "Ntest : $ntest ** Idc : $idcours<br/>";

 //   echo "<br/><br/><center>ENREGISTREMENT TEST</center><br/><br/>";
//Connexion à la base de données avec PDO
//Instanciation PDO
    $dsn = "mysql:host=localhost;dbname=e_learning";
    $user = "root";
    $pass = "";
    try
    {
    $pdo=new PDO($dsn,$user,$pass) ; //DSN [, user [, pass [, options]]]);
 //
 
  // Requête mysql pour insérer des données
  //
  // echo "ID USER : $iduser<br/>";
  //
      $sql = "INSERT INTO test(id_cours,titre_du_test) VALUES (:idc,:ntest)";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":idc"=>$idcours,":ntest"=>$ntest));
  //
  // vérifier si la requête d'insertion a réussi
  //
      if($exec)
  {
        //echo '<center>Données insérées</center><br/>';
		header("location:ajout-question.php");
      }
      else
      {
        //echo "<center>Échec de l'opération d'insertion</center><br/>";
		header("location:ajout-test.php");
      }
  //
 //
    $dbh = null ; //Fin de connexion : $dbh=null ; ou unset($dbh) ;
    }
    catch (PDOException $e) 
    {
      echo "Erreur: ".$e->getMessage()."<br/>" ;
      die() ;
    }




    ?>