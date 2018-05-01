<?php 
if (isset($_POST['sub']))
 {


if (isset($_POST['nomcommercial']) And isset($_POST['famille']) And isset($_POST['composition']) And isset($_POST['effet']) And isset($_POST['contraindic']) And isset($_POST['prixechantillon']) And isset($_POST['code']) ) {

$codee = $_POST['code'];
$nomcommerciall = $_POST['nomcommercial'];
$famillee = $_POST['famille'];
$compositionn= $_POST['composition'];
$effett = $_POST['effet'];
$contraindicc= $_POST['contraindic'];
$prixechantillonn= $_POST['prixechantillon'];




try {
    $bdd = new PDO("mysql:host=localhost;dbname=ppe3", 'root', '');
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO medicament(code, nomcommercial, famille, composition, effet, contraindic, prixechantillon)
    VALUES ('$codee', '$nomcommerciall', '$famillee','$compositionn', '$effett', '$contraindicc','$prixechantillonn')";
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
$bdd->query('SET NAMES UTF8');
$result = $bdd->query('SELECT code, nomcommercial, famille, composition, effet, contraindic, prixechantillon FROM medicament');
$films = $result->fetchAll(PDO::FETCH_ASSOC);
$total_films = $result->rowCount();

?>





<?php 
 if(isset($_POST['removeMedicament'])) {
    $code = $_POST['person'];
    //$reqResponsable = $bdd->prepare();        
    // Supprimer une ligne de donnée de la table practicien gràce au id
    $sql = "DELETE FROM medicament WHERE code = '$code'"; 
    $bdd->exec($sql);
} 
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
    <link rel="stylesheet" type="text/css" href="cons_visiteur.css">
    <meta charset="utf-8">
</head>
<body>


<label style='margin-left: 40%; font-size: 400%; '>VISITEUR</label><br><br>

<button id="ajout">Ajouter un medicament</button>

<form id="formRAPPORT_VISITE" name="formRAPPORT_VISITE" method="post" >

    <label class="code"> code : </label><input type="text" size="10" name="code" />
    <label class="nomcommercial"> nom commercial : </label><input type="text" size="10" name="nomcommercial" />
    <label class="famille"> famille : </label><input type="text" size="10" name="famille" />
    <label class="composition"> composition : </label><input type="text" size="10" name="composition" />
    <label class="effet"> effet : </label><input type="text" size="10" name="effet" />
    <label class="contraindic"> contraindic : </label><input type="text" size="10" name="contraindic" />
    <label class="prixechantillon"> prix echantillon : </label><input type="text" size="10" name="prixechantillon" />
    






    <div id="boutons">
             
             <input class="envoyer" type="submit" name="sub" id="submitForm" value="Envoyer"></input></div>
</form>
<table id="tableau" class="table table-striped table-bordered" cellspacing="27">
   <thead>
<tr><br>
    <th class="tb">code</th>
    <th class="tb">nom commercial</th>
    <th class="tb">famille</th>
    <th class="tb">composition</th>
    <th class="tb">effet</th>
    <th class="tb">contraindic</th>
    <th class="tb">prix echantillon</th>
    <th>Delete</th>

 

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
    <th>
                <form method="POST" action="">
                    <input type="hidden" name="person" value="<?php echo $film['code']; ?>">
                    <button type="submit" name="removeMedicament" id="removeMedicament" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce practicien ?')) return false;"><i>DELETE</i></button>
                  
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

