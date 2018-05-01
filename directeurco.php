<?php
if (isset($_POST['name']) AND isset($_POST['password'])) {
	//On a cliqué sur connexion comptable
	$BaseDeDonnees = new PDO('mysql:host=localhost;dbname=ppe3', 'root','');
	$user = $_POST['name'];
	$user_exist = false;
	foreach($BaseDeDonnees->query("SELECT password FROM directeur WHERE name = '$user'") as $row) {
		$user_exist = true;
		if ($row[0]==$_POST['password']) {
			
			header('Location: directeur.php');
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
	<title>directeur</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="directeurco.css">
	<meta charset="utf-8">

</body>
<title>Accueil</title>
</head>
<body>

	<div>
		<h1>GSB</h1>
	</div>

	<a id="visiteur" href="index.php">visiteur</a>
	<a id="deleguer" href="deleguerco.php">deleguer</a>
	<a id="directeur" href="directeurco.php">directeur</a>


	<p id="date">Aujourd'hui nous sommes le <?php echo date('d/m/Y'); ?>.</p>

	<div id="divconnexion">
		
		<p id="identifier">directeur </p>
		<label>identifiant : directeur <br> mots de passe : directeur</label>
		<form action="" method="post">
			<input id="name" name="name" placeholder="Nom d'utilisateur" required>
			<input id="password"  name="password" type="name" id="input" placeholder="●●●●●●●●●●" required>
			<div id="connect" onclick="document.getElementById('submit_identification').click()">
				<p id="connexion" >Connexion</p>
			</div>
			<input type="submit" id="submit_identification" style="display: none;">
		</form>
	</div>
</html>