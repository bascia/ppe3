<?php 
	session_start();

	$visiteur=$_SESSION['nom'];
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="visiteur.css">
	<title>Visiteur</title>

</head>
<body>

	

	<form  method="post" action="index.php">
		
   <input id="deco" type="submit" value="Se déconnecter" />
</form>

		<p style="color: white; font-size: 200%;"> Bonjour <?php echo $visiteur; ?> !</p>

	<label id="choix">Que souhaitez-vous faire? </label>

	<a id="compterendus" href="compterendus.php" >Compte rendus</a>
	
	<a id="cons" href="consultation.php" >Consultation des données</a>

	<a id="pract" href="practicien.php" >practicien</a>

	<a id="medoc" href="medicament.php" >medicament</a>


</body>
</html>