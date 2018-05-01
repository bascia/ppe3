<?php


 $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root','');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->query('SET NAMES UTF8');
$result = $bdd->query('SELECT code, nomcommercial, famille, composition, effet, contraindic, prixechantillon FROM medicament');
$films = $result->fetchAll(PDO::FETCH_ASSOC);
$total_films = $result->rowCount();

?>

<!DOCTYPE html>
<html>
<head>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>

    <title>medicament</title>
    <link rel="stylesheet" type="text/css" href="medicament.css">
    <meta charset="utf-8">
</head>
<body>
    
    <div class="zone"><a href="visiteur.php"><input class="retour" type="button" value="Retour"></a></input>
<label id="titre">medicament</label>

<table id="tableau" class="table table-striped table-bordered" cellspacing="27">
   <thead>
<tr><br>
    <th class="tb">depot legal</th>
    <th class="tb">nom commercial</th>
    <th class="tb">famille</th>
    <th class="tb">composition</th>
    <th class="tb">effet</th>
    <th class="tb">contraindic</th>
    <th class="tb">prix echantillon</th>
 

</tr>
</thead>

<?php
$cpt = 0;
foreach ($films as $film) {
?>
<tr >
    <th class="aff"><?php echo $film['code']; ?></th>
    <th class="aff"><?php echo $film['nomcommercial']; ?></th>
    <th class="aff"><?php echo $film['famille']; ?></th>
    <th class="aff"><?php echo $film['composition']; ?></th>
    <th class="aff"><?php echo $film['effet']; ?></th>
    <th class="aff"><?php echo $film['contraindic']; ?></th>
    <th class="aff"><?php echo $film['prixechantillon']; ?></th>
    
    
</tr>
<?php
    $cpt++;
}
?>
</table>

</body>
</html>

