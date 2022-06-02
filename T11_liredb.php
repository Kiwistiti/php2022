<?php

session_start();//sur toutes les pages > gérer les sessions
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("header.php");?>


    <title>T10_Lire_db</title>
   
    
</head>
<body>

<?php include("menu.php");?>

    <div class="container">

    <?php require_once("connect.php");

    $compter = $bdd->query('SELECT count(id) AS NBATH FROM person');
    $nb = $compter->fetchColumn();
    
    $reponse = $bdd->query('SELECT * FROM person limit 0,30');
    
    ?>
  <h2>Il y a <?= $nb ?> enregistrements</h2>
   <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr><th>ID</th><th>Nom</th><th>Genre</th><th>Détails</tr>
        </thead>

    <tbody>

    <?php foreach($reponse as $enr) { ?>

        <tr>
            <td><?=$enr['id']?></td>
            <td><?=$enr['full_name']?></td>
            <td><?=$enr['gender']?></td>
            <td><a href="T12_detaildb.php?personid=<?=$enr['id']?>" class="btn btn-danger btn-sm">Détails</a></td>


        <?php }    
        $reponse->closeCursor(); 

    ?>

    </tbody>
    </table>



    </div>

    

   <br><br><br><br><br><br>

   <?php include("footer.php");?>    

    <!-- Chargement librairie JQuery - Bootstrap-->
    
    
</body>
</html>