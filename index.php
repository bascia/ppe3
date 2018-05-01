<?php
if (isset($_POST['name']) && isset($_POST['dateembauche'])) {
	
	$BaseDeDonnees = new PDO('mysql:host=localhost;dbname=ppe3', 'root','');
	$user = $_POST['name'];
	 
	$user_exist = false;
	foreach($BaseDeDonnees->query("SELECT dateembauche FROM visiteur WHERE name = '$user'") as $row) {
		$user_exist = true;
		if ($row[0]==$_POST['dateembauche']) {
			session_start();
			$_SESSION['nom'] = $user;
			
			header('Location: visiteur.php');
			exit();

		}
		else{
			echo 'wrong password';
		}
	}
	if($user_exist == false){
		echo 'User doesn\'t exist';
	}
}



?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css">
	
	
	<title>Accueil</title>
</head>
<body>

	<div>
		<h1>GSB</h1>
	</div>

	<a id="visiteur" href="index.php">visiteur</a>
	<a id="deleguer" href="deleguerco.php">deleguer</a>
	<a id="directeur" href="directeurco.php">directeur</a>


	<p id="date">Aujourd'hui nous pipi sommes le <?php echo date('d/m/Y'); ?>.</p>

	<div id="divconnexion">
		
		<p id="identifier">Identifiez vous : </p>
		<form action="" method="post">
			<input id="name" name="name" placeholder="Nom d'utilisateur" required>
			<input id="password"  name="dateembauche" type="text" id="input" placeholder="●●●●●●●●●●" required>
			<div id="connect" onclick="document.getElementById('submit_identification').click()">
				<p id="connexion" >Connexion</p>
			</div>
			<input type="submit" id="submit_identification" style="display: none;">
		</form>
	</div>
	
	</body>
	<!--<script src="js/sloat.js"></script> -->
	</html>