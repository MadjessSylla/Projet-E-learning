<?php 
  include("head.php");
  include("menu-ens.php");
  	 //
 //
    if(isset($_POST["id_test"]))
      $idt = $_POST["id_test"] ;
     else
      $idt="";

    if(isset($_POST["id_etudiant"]))
      $idet = $_POST["id_etudiant"] ;
     else
    $idet=0;

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
      $sql = "delete from choix where id_etudiant=:idetu and id_reponse in(select distinct r.id_reponse from reponse r, question q 
	   where r.id_question=q.id_question and q.id_test=:idte) ";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":idetu"=>$idet,":idte"=>$idt));
  //
  // vérifier si la requête d'insertion a réussi
  //
      if($exec)
      {
        echo '<center>D&eacute;blocage effectu&eacute; avec succ&egrave;s</center><br/>';
		
      }
      else
      {
         echo "<center>Échec de l'opération de d&eacute;blocage</center><br/>";

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