<?php 
if (isset($_POST['sub']))
 {


if (isset($_POST['nom']) And isset($_POST['prenom']) And isset($_POST['adresse']) And isset($_POST['ville']) And isset($_POST['cp']) And isset($_POST['coefnotoriete']) And isset($_POST['lieuexercice']) ) {

$nomm = $_POST['nom'];
$prenomm = $_POST['prenom'];
$adressee= $_POST['adresse'];
$villee = $_POST['ville'];
$cpp= $_POST['cp'];
$coefnotorietee= $_POST['coefnotoriete'];
$lieuexercicee= $_POST['lieuexercice'];




try {
    $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO practicien(nom, prenom,adresse, ville, cp,coefnotoriete,lieuexercice)
    VALUES ('$nomm', '$prenomm','$adressee', '$villee', '$cpp','$coefnotorietee','$lieuexercicee')";
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



<?php


 $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = $bdd->query('SELECT id, nom, prenom, adresse, ville, cp, coefnotoriete, lieuexercice FROM practicien ORDER BY id ');
$films = $result->fetchAll(PDO::FETCH_ASSOC);
$total_films = $result->rowCount();


?>




<?php 
 if(isset($_POST['removePracticien'])) {
    $id = $_POST['person'];
    //$reqResponsable = $bdd->prepare();        
    // Supprimer une ligne de donnée de la table practicien gràce au id
    $sql = "DELETE FROM practicien WHERE id = '$id'"; 
    $bdd->exec($sql);
} 
  ?>

    
<html>
<head>
        <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="cons_practicien.css">

    
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>

    
	<title>Consultation des données</title>

</head>
<body>

<label style='margin-left: 40%; font-size: 400%; '>PRACTICIEN</label><br><br>

<button id="ajout">Ajouter un practicien</button>

<form id="formRAPPORT_VISITE" name="formRAPPORT_VISITE" method="post" >

    <label class="nom"> nom : </label><input type="text" size="10" name="nom" />
    <label class="prenom"> prenom : </label><input type="text" size="10" name="prenom" />
    <label class="adresse"> adresse : </label><input type="text" size="10" name="adresse" />
    <label class="ville"> ville : </label><input type="text" size="10" name="ville" />
    <label class="cp"> cp : </label><input type="text" size="10" name="cp" />
    <label class="coefnotoriete"> coef notoriete : </label><input type="text" size="10" name="coefnotoriete" />
    <label class="lieuexercice"> lieu exercice : </label><input type="text" size="20" name="lieuexercice" />

    <div id="boutons">
             
             <input class="envoyer" type="submit" name="sub" id="submitForm" value="Envoyer"></input></div>
</form>

<script>$(document).ready(function() {
    $('#tableau').DataTable();
} );</script>


<label id="titre">Consultation</label>

<table id="tableau" class="table table-striped table-bordered" cellspacing="27">
   <thead>
<tr><br>
    <th class="tb">id</th>
    <th class="tb">nom</th>
    <th class="tb">prenom</th>
    <th class="tb">adresse</th>
    <th class="tb">ville</th>
    <th class="tb">cp</th>
    <th class="tb">coefnotoriete</th>
    <th class="tb">lieuexercice</th>
    <th>Delete</th>



</tr>
</thead>

<?php
$cpt = 0;
foreach ($films as $film) {
?>
<tr >
	<th class="aff"><?php echo $film['id']; ?></th>
    <th class="aff"><?php echo $film['nom']; ?></th>
    <th class="aff"><?php echo $film['prenom']; ?></th>
    <th class="aff"><?php echo $film['adresse']; ?></th>
    <th class="aff"><?php echo $film['ville']; ?></th>
    <th class="aff"><?php echo $film['cp']; ?></th>
    <th class="aff"><?php echo $film['coefnotoriete']; ?></th>
    <th class="aff"><?php echo $film['lieuexercice']; ?></th>
    <th>
                <form method="POST" action="">
                    <input type="hidden" name="person" value="<?php echo $film['id']; ?>">
                    <button type="submit" name="removePracticien" id="removePracticien" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce practicien ?')) return false;"><i>DELETE</i></button>
                  
                </form>   
            </th>
 
 
    
</tr>
<?php
    $cpt++;
}
?>
</table>




</body>

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/libraries/jquery-1.9.1.js"></script>
<script src="js/directeur.js"></script>
</html>