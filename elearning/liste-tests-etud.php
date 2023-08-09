<?php
  include("head.php");
  include("menu-etud.php");
  
?>
	<div class="container"  style="margin-top:20px;width:50%;float:clear;">
		<h4 style="text-align:center;">Liste des Tests disponibles</h4>
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
                $res=$pdo->query("select t.*, c.titre_du_cours from test t, cours c where c.id_cours=t.id_cours order by t.date_heure desc;");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "<table style='width:850px;margin-left:10%;' class='table table-striped table-hover'>";
                echo "<tr><td>Num.</td><td>Titre Test</td><td>Titre Cours</td><td>Date/heure</td><td>Action</td></tr>";
                foreach($res as $ligne)
                {
					$ctr++;
                	$idt = $ligne["id_test"];
                	$titre_test = $ligne["titre_du_test"];
                	$titre_cours = $ligne["titre_du_cours"];
                	$dateh = $ligne["date_heure"];
					
					//
                	$idt = $ligne["id_test"];
                	echo "<tr><td>$ctr</td><td>$titre_test</td><td>$titre_cours</td><td>$dateh</td>
					<td><a href='afficher-test-etud.php?it=$idt&te=$titre_test' target='_blank'>Afficher</a></td>
					</tr>";
                }
               echo "</table>";
               //
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
            ?>
		
	</div>
	<script>
	//
     function supprimer(url)
     {
      if (confirm("Etes-vous certain(e) de vouloir supprimer ce cours?"))
      {
         window.open(url,"suppression","menubar=no, status=no, scrollbars=yes, menubar=no, width=850, height=700");
      }
      else
      {
        alert("SUPPRESSION ABANDONNEE !");
      }
  
     }
</script>
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
      background-image: url("pictures/imge2.jpg");
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