
<?php
session_start();

    $visiteur=$_SESSION['nom'];

 $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = $bdd->query("SELECT id, visiteur, Datevisite, Nom_pract, Cabinet, motif,  Nom_produit1, produit1_echant, Nom_produit2, produit2_echant, bilan FROM compte_rendus WHERE visiteur='$visiteur' ");
$films = $result->fetchAll(PDO::FETCH_ASSOC);
$total_films = $result->rowCount();


?>

    
<html>
<head>
        <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="consultation.css">
        <link rel="stylesheet" type="text/css" href="index.php">
    
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>

    
	<title>Consultation des données</title>

</head>
<body>



<script>$(document).ready(function() {
    $('#tableau').DataTable();
} );</script>
<!--

<a id="mode" href="http://localhost:8082/id5569689_ppe/graph1.php" >=> Voire les graphiques représentatif <= </a>
-->
<label id="titre">Consultation</label>

<table id="tableau" class="table table-striped table-bordered" cellspacing="27">
   <thead>
<tr><br>
    <th class="tb">ID</th>
    <th class="tb">visiteur</th>
    <th class="tb">Date de visite</th>
    <th class="tb">Nom du praticien</th>
    <th class="tb">Cabinet</th>
    <th class="tb">Motif de la visite</th>
    <th class="tb">Nom du premier produit</th>
    <th class="tb">Echantillons presenté pour le premier produit</th>
    <th class="tb">Nom du deuxieme produit</th>
    <th class="tb">Echantillons presenté pour le premier produit</th>
    <th class="tb">Bilan</th>


</tr>
</thead>

<?php
$cpt = 0;
foreach ($films as $film) {
?>
<tr >
	<th class="aff"><?php echo $film['id']; ?></th>
    <th class="aff"><?php echo $film['visiteur']; ?></th>
    <th class="aff"><?php echo $film['Datevisite']; ?></th>
    <th class="aff"><?php echo $film['Nom_pract']; ?></th>
    <th class="aff"><?php echo $film['Cabinet']; ?></th>
    <th class="aff"><?php echo $film['motif']; ?></th>
    <th class="aff"><?php echo $film['Nom_produit1']; ?></th>
    <th class="aff"><?php echo $film['produit1_echant']; ?></th>
    <th class="aff"><?php echo $film['Nom_produit2']; ?></th>
    <th class="aff"><?php echo $film['produit2_echant']; ?></th>
    <th class="aff"><?php echo $film['bilan']; ?></th>
    
</tr>
<?php
    $cpt++;
}
?>
</table>




</body>
 <script src="js/index.js"></script>
</html>