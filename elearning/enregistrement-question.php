<?php 
 //
    if(isset($_POST["id_test"]))
      $idt = $_POST["id_test"] ;
     else
      $idt="";

    if(isset($_POST["lquest"]))
      $lquest = $_POST["lquest"] ;
     else
    $lquest="";

    if(isset($_POST["num"]))
      $num = $_POST["num"] ;
     else
    $num="";

    if(isset($_POST["barem"]))
      $barem = $_POST["barem"] ;
     else
    $barem="";

//

    // echo "<br/><br/><center>ENREGISTREMENT QUESTION</center><br/><br/>";
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
      $sql = "INSERT INTO question(id_test,libelle_question,numero_question,bareme_question) VALUES (:idt,:lquest,:num,:barem)";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":idt"=>$idt,":lquest"=>$lquest,":num"=>$num,":barem"=>$barem));
  //
  // vérifier si la requête d'insertion a réussi
  //
      if($exec)
  {
        // echo '<center>Données insérées</center><br/>';
		header("location:ajout-question.php");
      }
      else
      {
        // echo "<center>Échec de l'opération d'insertion</center><br/>";
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