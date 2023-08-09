<?php
  include("head.php");
  include("menu-admin.php");
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
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;">
		<h4 style="text-align:center;">Test : <?php echo $titre; ?></h4>
		
		<br/> 
		    
      <?php
            //
		
			//Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
			 $ctr=0;
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               // MODULES
               //
               $res = $pdo->prepare("select * from question where id_test=? ") ;
               $res->setFetchMode(PDO::FETCH_ASSOC) ;
               $res->bindValue(1, $idt) ;
               $res->execute();
			   //
                echo "<table style='width:850px;margin-left:10%;' class='table table-striped table-hover'>";
                echo "<tr><td>Num.</td><td>Question</td><td>Bareme</td></tr>";
                //
				foreach($res as $ligne)
                {
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
			        foreach($res2 as $ligne2)
                    {
                	   $numr = $ligne2["numero_reponse"];
                	   $libr = $ligne2["libelle_reponse"];
                	   $barr = $ligne2["bareme_reponse"];
					   echo "$numr- \t $libr \t <br/>";
				    }
					echo "</td><td>$baremeq</td></tr>";
                }
               //
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
            ?>
		
	</div>
<?php
  include("footer.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
<style >
  body{
      background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("pictures/mary3.jpg");
      height: 140vh;
      width: 100%;
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