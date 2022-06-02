<?php
    session_start();
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

            <h1><?=_BIENVENUEADMIN?></h1>
            <h2><?=_BONNE_NAVIGATION_ADMIN?></h2>
        </div>
        <?php include("footer.php") ?>
    </body>
</html>