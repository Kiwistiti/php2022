<?php
    session_start();
    require_once("connect.php");
    include("functionnettoyer.php");
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>T12_details</title>
       
    </head>
    <body>
        
        <div class="container">
            <?php
                if (isset($_GET["personid"])) {
                    $personne = nettoyer($_GET['personid']);
                    $reponse = $bdd->prepare('SELECT full_name, gender, height, weight, region_name, games_name, city_name, sport_name, medal_name
                                                FROM person 
                                                        INNER JOIN person_region pr ON person.id = person_id
                                                        INNER JOIN noc_region noc ON noc.id = region_id
                                                        INNER JOIN games_competitor g ON g.person_id = person.id
                                                        INNER JOIN games ON g.games_id = games.id
                                                        INNER JOIN games_city c ON c.games_id = games.id
                                                        INNER JOIN city ci ON ci.id = c.games_id
                                                        INNER JOIN competitor_event ce ON g.id = ce.competitor_id
                                                        INNER JOIN event e ON event_id = e.id
                                                        INNER JOIN sport ON sport_id = sport.id
                                                        INNER JOIN medal ON medal_id = medal.id
                                                WHERE person.id = :personid ');                  //:personid = pseudovariable
                    $reponse->bindvalue('personid', $personne, PDO::PARAM_STR);      //Donne la variable dont on parle dans la requête PDO... dit que c'est absolument un string
                    $reponse->execute();        //Pour avoir une réponse de la DB sinon en attente
                    $result = $reponse->fetchAll();      //fetch permet de récupérer toutes les données de la table
                    
                }
            ?>
                    <p>Genre: <?=$result[0]['gender']?></p>
                    <p>Poids: <?=$result[0]['height']?> kg</p>
                    <p>Taille: <?=$result[0]['weight']?> cm</p>
                    <p>Pays: <?=$result[0]['region_name']?></p>
        <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr><th>Année - Jeux hiver ou été</th><th>Sport</th><th>Médaille ?</th></tr>
        </thead>

        <tbody>

        <?php foreach($result as $compet) { ?>

            <tr>
                <td><?=$compet['games_name']?></td>
                <td><?=$compet['sport_name']?></td>
                <td><?=($compet['medal_name']="NA") ? 'Pas de médaille': $compet['medal_name'] ?></td>
             </tr>   
            <?php } ?>  
            <br><br><br>
        </tbody>
        </table>            

        </div>
       
    </body>
</html>