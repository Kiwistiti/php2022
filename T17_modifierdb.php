<?php
    session_start();
    require_once("connect.php");
    
?>
<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <?php include("header.php")?>
        <title>Modifier un enregistrement | Init PHPMySQL</title>
       
    </head>
    <body>
        

        <?php include("menu.php")?>

        <h1>Modification d'un athlète</h1>
        <div class="container">
                <form action="T17_modifierdb.php" id="modifierdb" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 form-label">Nom complet:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Jean Dujardin">
                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Genre:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="M">
                            <label for="gender" class="form-check-label">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
                            <label for="gender" class="form-check-label">F</label>
                        </div>
                        <div class="form-group row">
                            <label for="taille" class="col-sm-2 col-form-label">Taille</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="taille" id="taille" aria-describedby="taille" placeholder="180">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="poids" class="col-sm-2 col-form-label">Poids</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="poids" id="poids" aria-describedby="poids" placeholder="85">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Modifier</button>
                    </div>
                </form>
            <?php  
            if($_SERVER['REQUEST_METHOD']=="POST"){
                var_dump($_POST);
                if(isset($_POST['name']) AND isset($_POST['gender']) AND isset($_POST['taille']) AND isset($_POST['poids']))
                {
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $taille = $_POST['taille'];
                    $poids = $_POST['poids'];
        

                    $name=nettoyer($name);
                    $gender=nettoyer($gender);
                    $taille=nettoyer($taille);
                    $poids=nettoyer($poids);

                    $verifpersonne = $bdd->prepare('SELECT COUNT(*) FROM person 
                                                    WHERE full_name = :nomcomplet AND gender = :gender');
                    $verifpersonne->bindvalue('nomcomplet', $name, PDO::PARAM_STR);
                    $verifpersonne->bindvalue('gender', $gender, PDO::PARAM_STR);
                    $verifpersonne->execute();
                    $nbpersonne = $verifpersonne->fetchColumn();
                    $verifpersonne->closeCursor();

                    //var_dump($verifpersonne);

                    if ($nbpersonne == 1)
                    {
                        $ajout = $bdd->prepare("UPDATE person 
                                                SET height=:taille, weight=:poids
                                                WHERE full_name = :nomcomplet");
                        $ajout->bindvalue('nomcomplet', $name, PDO::PARAM_STR);
                        $ajout->bindvalue('taille', $taille, PDO::PARAM_STR);
                        $ajout->bindvalue('poids',$poids, PDO::PARAM_STR);
                        $ajout->execute();
                ?>
                        <p>La modification a réussi</p>
                <?php
                    }
                    else
                    {
                ?>
                    <p>Cette personne n'existe pas, veuillez l'ajouter !</p>
                <?php
                    }
                ?>
                
                <?php 
                }
            } ?>
            
                    

        </div>
        <?php include("footer.php") ?>
    </body>
</html>