<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>PHP | Init PHP | Ajax liste déroulante</title>
        <?php include("header.php") ?>
    </head>
    <body>
        <?php include("menu.php") ?>
        <div class="container">

            <h1> Ajax </h1>
            <div> Choix de la marque :    
            <select name="choix" id="choix">
               <option value="1">Microsoft</option>
               <option value="2">Linux</option>
               <option value="3">Apple</option>
            </select>
            </div>
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
                    url:'T16_detailajax.php?ligne='+$(this).val(),
                    timeout:3000,                   //Si la requête ne s'exécute pas après 3s
                    success :function(donnees){
                        $("#donnees").html(donnees);
                    },
                    error : function(){
                        $("#donnees").html("La marque n'existe pas, ou alors ... Problème !");
                    }
                    
                });
            });
        });
    </script>
</html>