<?php 
 //
    if(isset($_POST["id_test"]))
      $idt = $_POST["id_test"] ;
     else
      $idt="";
    if(isset($_POST["titre_test"]))
      $titre = $_POST["titre_test"] ;
     else
      $titre="";
    //
    //
	if(isset($_POST["libelle_reponse"]))
      $lrep = $_POST["libelle_reponse"] ;
     else
      $lrep="";

    if(isset($_POST["id_question"]))
      $idq = $_POST["id_question"] ;
     else
    $idq="";

    if(isset($_POST["bareme_reponse"]))
      $rep = $_POST["bareme_reponse"] ;
     else
    $rep="";

    if(isset($_POST["numero_reponse"]))
      $nrep = $_POST["numero_reponse"] ;
     else
    $nrep="";

//

    // echo "<br/><br/><center>ENREGISTREMENT REPONSE</center><br/><br/>";
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
      $sql = "INSERT INTO reponse(id_question,numero_reponse,libelle_reponse,bareme_reponse) VALUES (:idq,:nurep,:lrep,:rep)";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":idq"=>$idq,":nurep"=>$nrep,":lrep"=>$lrep,":rep"=>$rep));
  //
  // vérifier si la requête d'insertion a réussi
  //
      if($exec)
      {
        // echo '<center>Données insérées</center><br/>';
		header("location:ajout-reponse.php?it=$idt&te=$titre");
      }
      else
      {
        // echo "<center>Échec de l'opération d'insertion</center><br/>";
		header("location:espace-enseignant.php");
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