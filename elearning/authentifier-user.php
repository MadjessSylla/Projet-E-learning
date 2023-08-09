<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-admin.php");
 //
 //
if(isset($_POST["login"]))
  $log = $_POST["login"] ;
 else
  $log="";
//
if(isset($_POST["passwd"]))
  $pas = $_POST["passwd"] ;
 else
  $pas="";
//
 //Instanciation PDO
   $dsn = "mysql:host=localhost;dbname=e_learning";
   $user = "root";
   $pass = "";
   //
   $pas = md5($pas);
   //
              try
              {
                 $pdo=new PDO($dsn,$user,$pass) ;
               //
			   // 
			   $iduser=0;
               //
               $res=$pdo->prepare("select * from user where login= :lg and mot_de_passe= :ps");
			   //	   
			   $res->bindParam(':lg',$log,PDO::PARAM_STR);
			   $res->bindParam(':ps',$pas,PDO::PARAM_STR);
			   $res->execute();
                $res->setFetchMode(PDO::FETCH_ASSOC);
               //
                foreach($res as $ligne)
                {
                	
                	$iduser = $ligne["id_user"];
                	$tuser = $ligne["type_user"];
                	//echo "USER : $iduser<br/>";
					//
					  if($tuser=="ETU")
					  {
						$_SESSION["iduser_etudiant"]=$iduser;
					    $_SESSION["typeuser_etudiant"]=$tuser;
					    //
                        header("location:espace-etudiant.php");
                      }	
					  else
                      if($tuser=="ENS")
					  {
						$_SESSION["iduser_enseignant"]=$iduser;
					    $_SESSION["typeuser_enseignant"]=$tuser;
					    //
                        header("location:espace-enseignant.php");
                      }
                      else
                      if($tuser=="ADM")
					  {
						$_SESSION["iduser_admin"]=$iduser;
					    $_SESSION["typeuser_admin"]=$tuser;
					    //
                        header("location:espace-admin.php");
                      }	
					  
				  
	
                }
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }

             if($iduser==0)
			  header("location:connecter.php");

?>