<!DOCTYPE html>
<?php 

	session_start();

	$visiteur=$_SESSION['nom'];

	$BaseDeDonnees = new PDO('mysql:host=localhost;dbname=ppe3', 'root','');

$select_pract = ""; 
	foreach($BaseDeDonnees->query("SELECT DISTINCT nom FROM practicien ") as $row) 
	{
		
		$select_pract = $select_pract."<option>$row[0]</option>";
	}

$produitbdd ="";
foreach($BaseDeDonnees->query("SELECT DISTINCT nomcommercial FROM medicament ") as $row) 
	{
		
		$produitbdd = $produitbdd."<option>$row[0]</option>";
	}


$BaseDeDonnees = new PDO('mysql:host=localhost;dbname=ppe3', 'root','');

	 
	foreach($BaseDeDonnees->query("SELECT region FROM visiteur WHERE name = '$visiteur'") as $row) {
		echo "region : " . $row[0];
		$region=$row[0];
	}






if (isset($_POST['sub']))
 {


if (isset($_POST['Datevisite']) And isset($_POST['Nom_pract']) And isset($_POST['Cabinet']) And isset($_POST['motif']) And isset($_POST['Nom_produit1']) And isset($_POST['produit1_echant']) And isset($_POST['bilan']) And isset($_POST['Nom_produit2']) And isset($_POST['produit2_echant']) ) {

$Datevisitee = $_POST['Datevisite'];
$Nom_practt = $_POST['Nom_pract'];
$Cabinett= $_POST['Cabinet'];
$motiff = $_POST['motif'];
$Nom_produitt1= $_POST['Nom_produit1'];
$produit1_echantt= $_POST['produit1_echant'];
$bilann= $_POST['bilan'];
$Nom_produitt2= $_POST['Nom_produit2'];
$produit2_echantt= $_POST['produit2_echant'];






try {
    $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO compte_rendus(Datevisite, Nom_pract,Cabinet, motif, Nom_produit1,produit1_echant,Nom_produit2,produit2_echant, bilan, visiteur, region)
    VALUES ('$Datevisitee', '$Nom_practt','$Cabinett', '$motiff', '$Nom_produitt1','$produit1_echantt','$Nom_produitt2','$produit2_echantt', '$bilann', '$visiteur', '$region')";
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
}
?>

<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" href="compterendus.css">
	<link rel="stylesheet" href="bootstrap/bootstrap.js">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.js">
	<link rel="stylesheet" href="bootstrap/npm.js">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>


	<title>Formulaire RAPPORT_VISITE</title>
	
</head>

<body>

<div class="modal fade" id="modalErreur" role="dialog">
        <div class="modal-dialog">

            <!-- Modal erreur-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="titreModalErreur"></h4>
                </div>
                <div class="modal-body">
                    <div id="textModalErreur" data-nomsecteur="" data-idajout="">

                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>




<div>
	<div >

		
		
		<form id="formRAPPORT_VISITE" name="formRAPPORT_VISITE" method="post" >
<div id="cache1">
			<h1> Compte rendus </h1><br><br>	


			<label class="date">Fait le </label><input style="text-align: center; width: 9%;"; type="date" size="5" name="Datevisite" id="date"  />
			
			
			<label class="cabinet"> Cabinet : </label><input type="text" size="10" name="Cabinet" id="Cabinet"  />
			<label class="practicien">Practicien : </label><select   name="Nom_pract" id="Nom_pract"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
				<option value="n0"></option>
			 <?php echo $select_pract; ?>
											
			</select>
			<div id="textremplacant"><input class="textremplacant" type="button" value="Remplacant"></input></div>
		</div>
			<div id="divremplacant">
			
			<label id="titreremp">Fiche de visite remplacant</label><br>
			<img id="closeimg" src="close_btn.png">
				<label id="nomremp"> Nom du remplacant : </label><input type="text" size="14" name="Nomremp"  /><br>
				
				<textarea id="bilanremp" class="text" rows="8" cols="45" name="bilanremp" placeholder="Ecrivez votre message ici" class="zone" ></textarea>
				<input id="validerremp" type="bouton" value="Valider"></input>
			
		</div>
<div id="cache2">
			
			<br><br><br><br>
			
			<label class="motif">Motif de la visite :</label><select id="motif" name="motif"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0"></option>
											<option value="Periodicité">Periodicité</option>
											<option value="Actualisations">Actualisations</option>
											<option value="Remontage">Remontage</option>
											<option value="Information complémentaire">Information complémentaire</option>
											<option value="Autre">Autre</option>

			</select>
			
			<br><br><br>

<div class="produit">
	<div id="pro1">
<label class="produit1">PRODUIT 1 :</label><select name="Nom_produit1" id="Nom_produit1"  onClick="selectionne('AUT',this.value,'PRA_NUM');">
	<option value="n0"></option>
			<?php echo $produitbdd; ?>
											
			</select><br><br>
			<label>Nombre d'échantillon présenté : <input name="produit1_echant" id="produit1_echant" placeholder="0" type="text" size="1" ></label></div><br><br>

			<div id="pro2">
			<label class="produit2">PRODUIT 2 :</label><select   name="Nom_produit2" id="Nom_produit2" onClick="selectionne('AUT',this.value,'PRA_NUM');">
			<option value="n0"></option>
											<?php echo $produitbdd; ?>
											
			</select><br><br>
			<label>Nombre d'échantillon présenté : <input name="produit2_echant" id="produit2_echant" placeholder="0" type="text" size="1"></label></div></div><br><br><br><br><br><br><br><br>


<div class="rating" name="etoile" >
<span value="1">☆</span><span value="2">☆</span><span value="3">☆</span><span value="4">☆</span><span value="5">☆</span>
</div>



			<label class="bilan">Bilan : <br><textarea class="text" rows="10" cols="110" name="bilan" id="bilan" placeholder="Un Avis peut être ?" class="zone" ></textarea></label>
		
			
			<br>
			<div id="boutons">
			 <div class="zone"><a href="visiteur.php"><input class="retour" type="button" value="Retour"></a></input><br></input>
			 <input  class="annuler" type ="reset" value="Reinitialiser">
			 <input class="envoyer" type="submit" name="sub" id="submitForm" value="Envoyer"></input></div>
		</form>
		</div>
	
	</div>
</div>
</div>
<!--
<script type="text/javascript">





$( "#submitForm" ).click(function() {

	if($("#Nom").val()=="" || $("#prenom").val()=="" || $("#Num_rap").val()=="" || $("#Datevisite").val()=="" || $("#Cabinet").val()=="" || $("#motif").val()=="" || $("#Nom_produit1").val()=="" || $("#produit1_echant").val()=="" || $("#Nom_produit2").val()=="" || $("#produit2_echant").val()=="" || $("#bilan").val()==""){
			document.getElementById("titreModalErreur").innerHTML = "Message d'erreur";
			document.getElementById("textModalErreur").innerHTML = "Veuillez remplir tous les champs !";
		  $('#modalErreur').modal('show');
	} else {
			$( "#formRAPPORT_VISITE" ).submit();
	}
});


        function ModalErreur(titre, text) {
            document.getElementById("titreModalErreur").innerHTML = titre;
            document.getElementById("textModalErreur").innerHTML = text;
            $('#modalErreur').modal('show');
        }
    </script>
-->
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/libraries/jquery-1.9.1.js"></script>
<script src="js/compterendus.js"></script>


</html>