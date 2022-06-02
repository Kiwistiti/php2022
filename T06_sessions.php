
<?php
    //session_cache_expire(1);            //Le cache de la session expire dans 1 minute
    $cache_expire = session_cache_expire(2);      
    session_start();                    //A mettre en premier lieu sur toutes les pages où les sessions sont utilisées

    echo "Votre session expire dans ".$cache_expire;

    $_SESSION["color"]='lightblue';
    $_SESSION["depart"] = time();
    var_dump($_SESSION);
?>

<!doctype html>
<html lang="fr">

<head>
    <title>PHP</title>
    <?php include("header.php"); ?>
</head>

<body>
    <?php include("menu.php"); ?>
   
    <div class="container">
        <h1>Les sessions</h1>
        <a href="T08_sessionscouleur.php" class="btn btn-danger">Session Couleur</a>
    </div>

    <?php include("footer.php") ?>
</body>

</html>