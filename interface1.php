<!DOCTYPE html>

<?php 


if (isset($_POST['Num_rap']) And isset($_POST['Datevisite']) And isset($_POST['Nom_pract']) And isset($_POST['Cabinet']) And isset($_POST['motif']) And isset($_POST['Nom_produit1']) And isset($_POST['produit1_echant']) And isset($_POST['bilan']) And isset($_POST['Nom_produit2']) And isset($_POST['produit2_echant']) And isset($_POST['Nom']) And isset($_POST['prenom']) ) {
$Num_rapp = $_POST['Num_rap'];
$Datevisitee = $_POST['Datevisite'];
$Nom_practt = $_POST['Nom_pract'];
$Cabinett= $_POST['Cabinet'];
$motiff = $_POST['motif'];
$Nom_produitt1= $_POST['Nom_produit1'];
$produit1_echantt= $_POST['produit1_echant'];
$Nom_produitt2= $_POST['Nom_produit2'];
$produit2_echantt= $_POST['produit2_echant'];
$bilann= $_POST['bilan'];
$Nomm= $_POST['Nom'];
$prenomm= $_POST['prenom'];
try {
    $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO compte_rendus(Num_rap, Datevisite, Nom_pract,Cabinet, motif, Nom_produit1,produit1_echant,Nom_produit2,produit2_echant, bilan, Nom, prenom)
    VALUES ('$Num_rapp', '$Datevisitee', '$Nom_practt','$Cabinett', '$motiff', '$Nom_produitt1','$produit1_echantt','$Nom_produitt2','$produit2_echantt', '$bilann', '$Nomm', '$prenomm' )";
    // use exec() because no results are returned
    $bdd->exec($sql);
    echo "";
    }
catch(PDOException $e)
    {	
    echo $sql . "<br>" . $e->getMessage();
    }

$bdd = null;
}					

?>

<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" href="visiteur.css">
	<title>Formulaire RAPPORT_VISITE</title>
	
</head>

<body>




<div >
	<div >
		<form name="formRAPPORT_VISITE" method="post" >
			<h1> Compte rendus </h1><br><br>	

			<label class="nom"> Nom : </label><input type="text" size="10" name="Nom"  />
			<label class="prenom"> Prenom : </label><input type="text" size="10" name="prenom"  />
			<label class="num_rapport"> Rapport n°</label><input type="text" size="1" name="Num_rap"  />
			<label class="date">Fait le </label><input style="text-align: center; width: 9%;"; type="date" size="5" name="Datevisite"  />
			
			
			<label class="cabinet"> Cabinet : </label><input type="text" size="10" name="Cabinet"  />
			<label class="practicien">Practicien : </label><select   name="Nom_pract"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0"></option>
											<option value="n1">Practicien 1</option>
											<option value="n2">Practicien 2</option>
											<option value="n3">Practicien 3</option>
											<option value="n4">Practicien 4</option>
											
			</select><br><br><br><br>
			
			<label class="motif">Motif de la visite :</label><select   name="motif"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0"></option>
											<option value="n1">Periodicité</option>
											<option value="n2">Actualisations</option>
											<option value="n3">Remontage</option>
											<option value="n4">Information complémentaire</option>
											<option value="n5">Autre</option>
											
			</select>
			
			<br><br><br>

<div class="produit">
	<div id="pro1">
<label class="produit1">PRODUIT 1 :</label><select name="Nom_produit1"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0" ></option>
											<option value="n1">Produit 1</option>
											<option value="n2">Produit 2</option>
											<option value="n3">Produit 3</option>	
											<option value="n4">Produit 4</option>
											
			</select><br><br>
			<label>Nombre d'échantillon présenté : <input name="produit1_echant" placeholder="0" type="text" size="1" ></label></div><br><br>

			<div id="pro2">
			<label class="produit2">PRODUIT 2 :</label><select   name="Nom_produit2"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0"></option>
											<option value="n1">Produit 1</option>
											<option value="n2">Produit 2</option>
											<option value="n3">Produit 3</option>
											<option value="n4">Produit 4</option>
											
			</select><br><br>
			<label>Nombre d'échantillon présenté : <input name="produit2_echant" placeholder="0" type="text" size="1"></label></div></div><br><br><br><br><br><br><br><br>



<div class="rating">
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
</div>



			<label class="bilan">Bilan : <br><textarea class="text" rows="10" cols="110" name="bilan" placeholder="Un Avis peut être ?" class="zone" ></textarea></label>
		
			
			<br>
			<div id="boutons">
			 <div class="zone"><a href="compterendus.html"><input class="retour" type="button" value="Retour"></a></input><br></input>
			 <input  class="annuler" type="reset" value="Reinitialiser">
			 <input class="envoyer" type="submit" value="Envoyer"></input>
		</form>
		</div>
	
	</div>
</div>


</body>
</html>