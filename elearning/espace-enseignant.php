<?php session_start();
// include("connexion.php");
//
include("menu-ens.php");
 //
 //
 // echo "USER : ".$_SESSION["iduser_enseignant"]." ** TYPE : ".$_SESSION["typeuser_enseignant"];
 //
 //
include("footer.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="welcom-text">
			<h1>Bienvenue sur la plateforme<br>de L'Université Privée Mary Saint Claire!</h1>
		</div>
</body>
<style >
	body{
			background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("pictures/img7.JPG");
			height: 100vh;
			width: 100%;
			-webkit-background-size:cover;
			background-size: cover;
			background-position: center center;
			position: relative;

		}
		.welcom-text{
			position: absolute;
			width: 600px;
			height: 300px;
			margin: 20% 30%;
			text-align: center;
		}
.welcom-text h1{
			background-color: #5fd3;
			text-align: center;
			color: #fff;
			text-transform: uppercase;
			font-size: 35px;
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