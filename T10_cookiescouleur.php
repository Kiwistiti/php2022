<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title></title>
        <?php include("header.php") ?>
        <?php
            if(!isset($_COOKIE['couleur'])){
                header('location:index.php');
                die();
            }
            else {
                $nettoyercouleur = nettoyer($_COOKIE['couleur']);
            }
        ?>
        <style>
        body{
                background-color:<?= isset($nettoyercouleur) ? $nettoyercouleur : "lightgray";?>;
            }
        </style>
    </head>
    <body>
        <?php include("menu.php") ?>
        <div class="container">


        </div>
        <?php include("footer.php") ?>
    </body>
</html>