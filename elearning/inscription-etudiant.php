<?php
  include("head.php");
  include("menu-admin.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 


	<div class="container"  style="margin-top:20px;width:30%;float:clear;">
    <left style="color: white;"  ><center class="titre" >Inscription Etudiant</center><br> 
	<form action="enregistrer-etudiant.php" method="POST">
	<label for="nom">Nom : </label>
	<input type="text" name="nom" id="nom" placeholder="Entrez votre nom" class='form-control' required /><br/>
	<label for="prenom">Prénom : </label>
	<input type="text" style="margin-top:5px;" name="prenom" id="prenom" placeholder="Entrez votre Prénom" class='form-control' required /><br/>
	<label for="mail">E-Mail : </label>
	<input type="E-Mail" name="mail" id="mail" placeholder="Entrez votre adresse e-mail" class='form-control' required /><br/>
	<label for="age">Age : </label>
	<input type="number" name="age" id="age" placeholder="Votre age" class='form-control' required /><br/>
	
	<label for="sexe">Sexe: </label>
	<select name="Sexe" id="Sexe" class='form-control'>
		<option value="M">Masculin: </option>
		<option value="F">Féminin: </option>
	</select><br/>
	<label for="filière">Filière: </label>
	<select name="filiere" id="filiere" class='form-control'>
		<option value="GIT">Génie Informatique et Télecommunication: </option>
		<option value="IG">Informatique de Gestion: </option>
		<option value="FC">Finance compatabilité: </option>
		<option value="BA">Banque Assurance: </option>
		<option value="GEA">Gestion d'Entreprise et des Administration: </option>
		<option value="CI">Commerce International: </option>
		<option value="MC">Marketting Communication: </option>
		<option value="DA">Droit des Affaires(Droit Public ,Droit Privée: </option>
		
	</select><br/>
    <label for="mail">Login : </label>
	<input type="int" name="login" id="login" placeholder="votre login" required class='form-control' /> <br> 
	<label for="mail">Mot de passe : </label>
	<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"required class='form-control' />
	<br>
	<input type="submit" value="Envoyer" class="btn-primary" style="margin-left:50%;" />
	<br/><br/>
	
	</form>	
		
	</div>


</body>
<style >
	body{
			background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("pictures/img.jpg");
			height: 100vh;
			width: 98%;
			-webkit-background-size:cover;
			background-size: cover;
			background-position: center center;
			position: relative;

		}
		.container{
			position: absolute;
			top:70%;
			left:50%;
			transform: translate(-50%,-50%);
			box-sizing: border-box;
			background-color: rgba(0,0,0,0.5);
			padding: 10px;
			margin: 20px;
			border-radius: 15px;
			border: 1px solid #fff;
		}
		.container:hover{
		background: linear-gradient(45deg, #FC4668 ,#3F5EFB);

		}
		.titre{
			margin: 0;
			padding: 0 0 20px;
			font-weight: bold;
			color: white;
			text-align: center;  
		}

</style>
</html>

	
<?php


?>