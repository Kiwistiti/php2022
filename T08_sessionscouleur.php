<?php
    
    session_start();                    //A mettre en premier lieu sur toutes les pages où les sessions sont utilisées
    
    if(!isset($_SESSION["depart"])){

        header ('location:index.php');
        die();
    }
    else {
        //echo "Bienvenue";
    }
?>

<!doctype html>
<html lang="fr">

<head>
    <title>PHP | Les sessions</title>
    <?php include("header.php"); ?>

    <style type="text/css">
        body{
            background-color: <?= isset($_SESSION["color"]) ? $_SESSION["color"] : "lightgray" ?>;      
        }
    </style>
    <!--Test dans le style en écriture ternaire -->
</head>

<body>
    <?php include("menu.php"); ?>

    <div class="container">
        <h1>Session couleur</h1>

        <?php
            $duree = 1;
            /*echo "Temps";
            var_dump(time());
            echo "Depart";
            var_dump($_SESSION["depart"]);*/

            if (isset($_SESSION['depart']) && time() - $_SESSION["depart"] > $duree)
            {
                echo "Durée dépassée";
                //Détruit toutes les variables de session
                $_SESSION = array();            //Supprime TOUTES les sessions
                //unset($_SESSION['color']);      //Supprime uniquement une valeur

                //Si on détruit toute la session, effacer également le cookie de session
                //Note: détruira la session et pas seulement les données de session.
                //Ne doit pas le faire si on fait un unset
                if(ini_get("session.use_cookie")){
                    $params = session_get_cookie_params();
                    setcookie(session_name(),' ', time()-42000,         //On revient en arrière dans le temps
                        $params["path"],$params["domain"],
                        $params["secure"], $params["httponly"]
                        );
                }
                //Finalement on détruit la session
                session_destroy();                //Remise à Zéro de la session, supprime pas le cookie

                //retour à l'accueil
                header('location:index.php');
                die();                            //On tue la tâche
            }
            else{
                echo "Ok, on continue";
            }
        ?>

    </div>  

    <?php include("footer.php") ?>
</body>

</html>