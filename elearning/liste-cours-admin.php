<?php
  include("head.php");
  include("menu-admin.php");
  
?>
	<div class="container"  style="margin-top:20px;width:100%;float:clear;">
		<h4 style="text-align:center;color: white;">Liste des cours disponibles</h4>
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
                $res=$pdo->query("select c.*,m.module from cours c, module m where c.id_module=m.id_module order by c.titre_du_cours");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                echo "<table style='width:850px;margin-left:10%;' class='table table-striped table-hover'>";
                echo "<tr>
				       <td align='center' width='50'>Num.</td>
					   <td align='center' width='200'>Titre</td>
					   <td align='center' width='150'>Description</td>
					   <td align='center' width='150'>Module</td>
					   <td align='center' width='150'>Fichier 1</td>
					   <td align='center' width='150'>Fichier 2</td>
					 </tr>";
                foreach($res as $ligne)
                {
					$ctr++;
                	$titre = $ligne["titre_du_cours"];
                	$desc = $ligne["description"];
                	$idc = $ligne["id_cours"];
                	$mod = $ligne["module"];
                	$fich1 = $ligne["fichier1"];
                	$fich2 = $ligne["fichier2"];
					//
					if(strlen(trim($fich1))>3)
					{
					 $fich1 = "upload_cours/".$fich1;
					 $url1="<a href='$fich1' target='_blank'>Support 1</a>";
					}
				    else
					 $url1="";
					//
					if(strlen(trim($fich2))>3)
					{
					 $fich2 = "upload_cours/".$fich2;
					 $url2="<a href='$fich2' target='_blank'>Support 2</a>";
					}
				    else
					 $url2="";
					//
					//
                	echo "<tr><td align='center'>$ctr</td>
					          <td align='center'>$titre</td>
							  <td align='center'>$desc</td>
							  <td align='center'>$mod</td>
					          <td align='center'>$url1</td>
					          <td align='center'>$url2</td>
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
      background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("pictures/img-cours.jpg");
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