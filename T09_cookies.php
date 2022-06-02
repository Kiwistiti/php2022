<?php
    session_start();
    $color = "seagreen";
    setcookie('couleur', $color, time()+30, '/');
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title></title>
        <?php include("header.php") ?>
        
    </head>
    <body>
        <?php include("menu.php") ?>
        <div class="container">
        <br><br><br>
        <a href="T10_cookiescouleur.php" class="btn btn-info">Cookies Couleurs</a>

        </div>
        <?php include("footer.php") ?>
    </body>
</html>