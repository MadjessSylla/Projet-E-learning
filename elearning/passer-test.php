<?php session_start();
  include("head.php");
  include("menu-etud.php");
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
		 //
		 if($idt==0)
		 {
		   $idt = $_SESSION["id_test_encours"];
		   $titre = $_SESSION["titre_test_encours"]; 
		 }
		 else
	     {
		  $_SESSION["id_test_encours"]=$idt;
		  $_SESSION["titre_test_encours"]=$titre;
		  // 
		 }
	     
		//
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;">
		<h4 style="text-align:center;color: white;">Evaluation : <?php echo $titre; ?></h4>
		<br/> 
		   <form method="POST" action="enregistrer-reponse-etudiant.php" > 
      <?php
            //
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
			   $fin = true;
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
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               // MODULES
               //
               $res = $pdo->prepare("SELECT distinct * FROM question where id_test=? and  not(id_question in(select q.id_question from question q, 
			   reponse r, choix c where q.id_question=r.id_question and r.id_reponse=c.id_reponse and c.id_etudiant=? )) limit 0,1") ;
               $res->setFetchMode(PDO::FETCH_ASSOC) ;
               $res->bindValue(1, $idt) ;
               $res->bindValue(2, $idet) ;
               $res->execute();
			   //
			    echo "<table class='table table-striped'>";
                //echo "<tr><td>Num.</td><td>Question</td><td>Bareme</td></tr>";
                //
				foreach($res as $ligne)
                {
					//
					$fin = false;
					//
					$ctr++;
                	$idq = $ligne["id_question"];
                	$libelleq = $ligne["libelle_question"];
                	$baremeq = $ligne["bareme_question"];
                	$numeroq = $ligne["numero_question"];
		            //
                	echo "<tr><td>$numeroq";
					//	
					echo "</td><td><span style='color:#00f;'>$libelleq</span><br/>";
					$res2 = $pdo->prepare("select * from reponse where id_question=? ") ;
                    $res2->setFetchMode(PDO::FETCH_ASSOC) ;
                    $res2->bindValue(1, $idq) ;
                    $res2->execute();
					echo "<table>";
			        foreach($res2 as $ligne2)
                    {
                	   $idr = $ligne2["id_reponse"];
                	   $numr = $ligne2["numero_reponse"];
                	   $libr = $ligne2["libelle_reponse"];
                	   $barr = $ligne2["bareme_reponse"];
					   echo "<tr><td>$numr-&nbsp;<input type='hidden' value='$idr' name='idrep[]' id='idrep[]' /></td><td>$libr</td>
					   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type='checkbox' value='$idr' name='coche[]' id='coche[]' tabindex='1'  /></td></tr>";
				    }
					echo "</table></td><td</td></tr>";
                }
               //
			     echo "</table>";
               //
			 if($fin)
			 {
			  echo "<p style='font-size:12pt;color:#f00;margin-left:40%;'>FIN DU TEST !</p>";
			  //
			   $resq = $pdo->prepare("SELECT * FROM question where id_test=?") ;
               $resq->setFetchMode(PDO::FETCH_ASSOC) ;
               $resq->bindValue(1, $idt) ;
               $resq->execute();
                //
				$tot_scoreq=0;
				//
				foreach($resq as $ligneq)
                {
				  $baremeq = $ligneq["bareme_question"];
				  $tot_scoreq += $baremeq ;
			  
			    }
			  //
			   $ress = $pdo->prepare("SELECT r.* FROM reponse r, question q where r.id_question=q.id_question and q.id_test=? 
			   and r.id_reponse in(select id_reponse from choix where id_etudiant=? )") ;
               $ress->setFetchMode(PDO::FETCH_ASSOC) ;
               $ress->bindValue(1, $idt) ;
               $ress->bindValue(2, $idet) ;
               $ress->execute();
                //
				$tot_score=0;
				//
				foreach($ress as $lignes)
                {
				  $bareme = $lignes["bareme_reponse"];
				  $tot_score += $bareme ;
			  
			    }
			  //
			  echo "<p style='text-align:center;font-size:13pt;color:#999;margin-left:22%;border-style:solid;width:300px;'>
			  Score r&eacute;alis&eacute; : <span style='color:#00f;'>$tot_score / $tot_scoreq</span></p>";
		    }
		    else
			  echo "<input type='submit' value='Enregistrer' style='margin-left:80%;' class='btn btn-primary'/>";  
			//   
            }
            catch(PDOException $e)
            {
              echo "Erreur : ".$e->getMessage()."</br>";
            }
			
            ?>
			
		  </form>
	
		<br/>
	</div>
<?php
  include("footer.php");
?><!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
<style >
  body{
      background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("pictures/test.png");
      height: 100vh;
      width: 98%;
      -webkit-background-size:cover;
      background-size: cover;
      background-position: center center;
      position: relative;

    }
    li {
list-style:none !important;
color:#000;
padding:10px;
font-size:12pt;
text-decoration:none;
}

nav{
  margin-left : 58%;
    
}
nav ul {
background-color:#F0F8FF;
padding:0;
margin:0;
}
nav ul li {
list-style: none;
line-height:15px;
float:left;
background-color:#F0F8FF;
}
nav ul li a {
color:#000;
padding:10px;
font-size:12pt;
text-decoration:none;
}
li a:hover {
border-bottom:3px #000 solid;
color:#f00;
background-color:#DCDCDC;
}
nav ul li ul { display:none; } /* Rend le menu déroulant caché par défaut */
nav ul li:hover ul { /* Affiche la dropNav au survol de la souris avec la class .drop */
z-index:99999;
display:list-item !important;
position:absolute;
margin-top:5px;
margin-left:-10px;
}
nav ul li:hover ul li {
float:none;
}
</style>
</html>