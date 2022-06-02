<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>PHP|Init PHP|Lire DB Ajax</title>
        <?php include("header.php") ?>
    </head>
    <body>
        <?php include("menu.php") ?>
        <div class="container">
    
        <h1>Lire DB via Ajax</h1>
        <h2>Choisir un prénom</h2>
        <select name="choix" id="choix">
            <?php
                require_once("connect.php");
                $reponse = $bdd->query('SELECT * FROM person limit 0,30');
            ?>
            <?php
                foreach ($reponse as $enr) { ?>
            <option value="<?= $enr['id'] ?>"><?= $enr['full_name'] ?></option>
            <?php } 
            $reponse->closeCursor();     //Ferme la requête
            ?>
        </select>
            <div class="container" id="donnees">
            
            </div>
        </div>
        
        <?php include("footer.php") ?>
    </body>

    <script>
        $(document).ready(function(){
            $("#choix").change(function(){
                //alert($(this).val());
                $.ajax({                            //Activer ajax
                    type:'GET',
                    url:'T14_detaildbajax.php?personid='+$(this).val(),
                    timeout:3000,                   //Si la requête ne s'exécute pas après 3s
                    success :function(donnees){
                        $("#donnees").html(donnees);
                    },
                    error : function(){
                        $("#donnees").html("La requête n'a pas abouti");
                    }
                });
            });
        });
    </script>
</html>