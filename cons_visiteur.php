<?php
     try {
    $bdd = new PDO('mysql:host=localhost;dbname=ppe3;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}


  ?>


<?php 
 if(isset($_POST['removeVisiteur'])) {
    $id = $_POST['person'];
    //$reqResponsable = $bdd->prepare();        
    // Supprimer une ligne de donnée de la table practicien gràce au id
    $sql = "DELETE FROM visiteur WHERE id = '$id'"; 
    $bdd->exec($sql);
} 
  ?>

<?php 
if (isset($_POST['sub']))
 {


if (isset($_POST['name']) And isset($_POST['adresse']) And isset($_POST['cp']) And isset($_POST['ville']) And isset($_POST['dateembauche']) And isset($_POST['region']) ) {

$namee = $_POST['name'];
$adressee = $_POST['adresse'];
$cpp= $_POST['cp'];
$villee = $_POST['ville'];
$dateembauchee= $_POST['dateembauche'];
$regionn= $_POST['region'];




    $sql = "INSERT INTO visiteur(name, adresse, cp, ville, dateembauche, region)
    VALUES ('$namee', '$adressee','$cpp', '$villee', '$dateembauchee','$regionn')";
    // use exec() because no results are returned
    $bdd->exec($sql);
 


}
}
?>





<?php

$result = $bdd->query('SELECT id, name, adresse, cp, ville, dateembauche, region FROM visiteur ORDER BY id ');
$films = $result->fetchAll(PDO::FETCH_ASSOC);
$total_films = $result->rowCount();


?>

    
<html>
<head>
        <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="cons_visiteur.css">

    
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>

    
	<title>Consultation des données</title>

</head>
<body>


<label style='margin-left: 40%; font-size: 400%; '>VISITEUR</label><br><br>

<button id="ajout">Ajouter un visiteur</button>

<form id="formRAPPORT_VISITE" name="formRAPPORT_VISITE" method="post" >

    <label class="name"> name : </label><input type="text" size="10" name="name" />
    <label class="adresse"> adresse : </label><input type="text" size="10" name="adresse" />
    <label class="cp"> cp : </label><input type="text" size="10" name="cp" />
    <label class="ville"> ville : </label><input type="text" size="10" name="ville" />
    <label class="dateembauche"> dateembauche : </label><input type="text" size="10" name="dateembauche" />
    <label class="region"> region : </label><input type="text" size="10" name="region" />
    





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
    <th class="tb">ID</th>
    <th class="tb">name</th>
    <th class="tb">adresse</th>
    <th class="tb">cp</th>
    <th class="tb">ville</th>
    <th class="tb">dateembauche</th>
    <th class="tb">region</th>
    <th>Delete</th>



</tr>
</thead>

<?php
$cpt = 0;
foreach ($films as $film) {
    //var_dump($_POST['person']);
    //var_dump(isset($_POST['removeVisiteur']));
?>
<tr >
	<th class="aff"><?php echo $film['id']; ?></th>
    <th class="aff"><?php echo $film['name']; ?></th>
    <th class="aff"><?php echo $film['adresse']; ?></th>
    <th class="aff"><?php echo $film['cp']; ?></th>
    <th class="aff"><?php echo $film['ville']; ?></th>
    <th class="aff"><?php echo $film['dateembauche']; ?></th>
    <th class="aff"><?php echo $film['region']; ?></th>
    <th>
                <form method="POST" action="">
                    <input type="hidden" name="person" value="<?php echo $film['id']; ?>">
                    <button type="submit" name="removeVisiteur" id="removeVisiteur" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce practicien ?')) return false;"><i>DELETE</i></button>
                  
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