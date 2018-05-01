<?php  
		
		$BaseDeDonnees = new PDO('mysql:host=localhost;dbname=ppe3', 'root','');

	$option = ""; 
	foreach($BaseDeDonnees->query("SELECT DISTINCT region FROM visiteur ") as $row) 
	{
		//echo "region : " . $row[0];
		$option = $option."<option>$row[0]</option>";
	}


if (isset($_POST['envoyer']))

 {
 	$region = $_POST['selection_region'];
 	var_dump($region);
	foreach($BaseDeDonnees->query("SELECT id, visiteur, Datevisite, Nom_pract, Cabinet, motif,  Nom_produit1, produit1_echant, Nom_produit2, produit2_echant, bilan FROM compte_rendus WHERE region = '$region' ") as $row) 
	{

		echo "
<tr>
	<th>".$row['id']."</th>
    <th>".$row['visiteur']."</th>
    <th>".$row['Datevisite']."</th>
    <th>".$row['Nom_pract']."</th>
    <th>".$row['Cabinet']."</th>
   	<th>".$row['motif']."</th>
    <th>".$row['Nom_produit1']."</th>
    <th>".$row['produit1_echant']."</th>
    <th>".$row['Nom_produit2']."</th>
    <th>".$row['produit2_echant']."</th>
    <th>".$row['bilan']."</th>
    
</tr>
";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>region</title>
	<meta charset="utf-8">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['status', 'nomber of patients'],
          ['region 1',     2],
          ['region 2',     2],
          ['region 3',     2],
         
        ]);

        var options = {
          title: 'Nombre de visite par region',
          colors:['red', 'blue', 'green'],
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
	<form method="POST" action="">
		<select name="selection_region">
				<?php echo "$option";?>
		</select>
		<input type="submit" name="envoyer" value="envoyer"> 
	</form>

<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>