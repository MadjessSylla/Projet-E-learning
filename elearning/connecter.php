<?php session_start();
// include("connexion.php");
//
include("head.php");
include("menu-con.php");
 //
 //Instanciation PDO
   $dsn = "mysql:host=localhost;dbname=e_learning";
   $user = "root";
   $pass = "";
?>
<!DOCTYPE html>
<html>
<head>
	   <a class="logo">
		<img src="images/logo.jpg" alt="logo">
	   </a>

</head>
<body>


<div class="container"  style="margin-top:150px;width:30%;float:clear;">
<center style="font-weight:bold;font-size:13pt;color:#F0F8FF;">Connexion utilisateur</center><br> 
<form action="authentifier-user.php" method="post" id="sendemail" enctype="multipart/form-data">
			<p><b>Bienvenue<br>sur la plateforme d'e-learning de Mary Saint Claire</b></p>

<input type="text" placeholder="Login" required class='form-control'  name="login" id="login" size="40" />
<input type="password" placeholder="Mot de passe" wrap="virtual" name="passwd" id="passwd" required class='form-control' />
<br/><input type="submit" class="btn-primary" value="Connecter" style="margin-left:3%;" />
           
</form>
	<div class="drop drop-1"></div>
	<div class="drop drop-2"></div>
	<div class="drop drop-3"></div>
	<div class="drop drop-4"></div>
	<div class="drop drop-5"></div>

</div>
</body>
<style >
	.logo{	
			width: 200px;
			height: 90px;
			float: left;
			position: relative;
			left: 1%;

		}
		.logo img{
			margin: 10px;
			width: 200px;
			height: 90px;

		}
		body{
			font-family: Roboto,heltiveca neue,ubuntu,sans-serif;
			background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("elearning/images/mary3.jpg");
			width: 100%;
			height: 100vh;
			-webkit-background-size:cover;
			background-size: cover;
			background-position: center center;
			position: relative;

		}
		 form{
  	background: rgba(255,255,255, .3);
  	padding: 2rem;
    margin: 10rem;
  	height: 300px;
    position: absolute;
    top:46%;
    left:43%;
    transform: translate(-50%,-50%);
 
  	border-radius: 20px;
  	border-left:  1px solid rgba(255,255,255, .3);
  	border-top: 1px solid rgba(255,255,255,.3);
  	/* effet sympa à ajouter*/
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    -moz-backdrop-filter:blur(10px);	
  	box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, .2);
  	text-align: center;
  }

  input {
    background: transparent;
  	border: none;
  	border-left: 1px solid rgba(255, 255, 255, .3);
  	border-top: 1px solid rgba(255, 255, 255, .3);
  	padding: 1rem;
  	width: 200px;
  	border-radius: 50px;
  	backdrop-filter: blur(5px);
  	-webkit-backdrop-filter: blur(5px);
  	-moz-backdrop-filter: blur(5px);
  	box-shadow: 4px 4px 60px rgba(0, 0, 0, .2);
  	color:white;
  	font-weight: 500;
  	text-shadow: 2px 2p 4px rgba(0, 0, 0, .2);
  	transition: all .3;
  	margin-bottom: 2em;

  }
   ::placeholder{

  	color: white;
  }
  p{
  	color: black;
  	font-weight: 500;
  	opacity: .7;
  	font-size: 1.4rem;
  	margin-bottom: 30px;
  	text-shadow: 2px 2px 4px rgba(0, 0, 0, .2);

  }

 input:hover,
 input[type="Login"]:focus,
 input[type="password"]:focus{
 	background: rgba(255,255,255 .1);
 	box-shadow: 4px 4px 60px 8px rgba(0, 0, 0, .2);
 }
 input[type="button"] {
 	text-align: center;
 	cursor: pointer;
 	margin-top: 10px;
 	font-size: 1rem;
 	width: 100px;
  border-bottom: 5px solid #111;
  transition: all .1s;
  -webkit-transition:all .1s;

 }

  input[type="button"]:active {
    transform: translate(0, 5px);
    -webkit-transform:translate(0, 5px) ;
    border-bottom: 1px solid;
 }
 .drop{
 	background: rgba(255, 255, 255, .3);
 	backdrop-filter:blur(10px);
  -webkit-backdrop-filter:blur(10px);
  -moz-backdrop-filter:blur(10px);
  position: absolute;
  border-left: 1px solid rgba(255, 255, 255, .3);
  border-top: 1px solid rgba(255, 255, 255, .3);
  
  border-radius: 10px;
  box-shadow: 10px 10px 60px -8px rgba(0, 0, 0, .2); 

 }
 .drop-1{ 
	height: 80px; width: 80px;
	top: 200px; left: 450px;
	z-index: -1;

  }

    .drop-2{
	height: 80px; width: 80px;
  bottom: 70px; right: 450px;
    }
    
    .drop-3{
	height: 100px; width: 100px;
	bottom: 240px; right: 490px;
	z-index: -1;

    }
    .drop-4{
	height: 110px; width: 110px;
	bottom: 380px; right: 410px;

}
    .drop-5{
	height: 60px; width: 60px;
	bottom: 200px; left: 497px;
	z-index: -1;
  }
</style>
</html>
<?php
 include("footer.php");
//}
?>
