<!doctype html>
<html lang="fr">

<head>
    <title>PHP</title>
    <?php include("header.php") ?>
</head>
<?php 
    $flag = false;
    if($_SERVER['HTTP_REFERER'] === "http://".$_SERVER['SERVER_NAME']."/t03-superglobal.php"){
        if(isset($_GET["couleur"])){
            $couleur = strip_tags($_GET["couleur"]);
            $couleur = htmlentities($couleur);
            if($couleur == "rouge"){
                $flag = true;
            }
        }
    }
?>
<body class="<?= ($flag ? "bg-danger" : "bg-secondary") ?>">
    <?php include("menu.php") ?>
    <main>
        <div class="container">
            <h1>Super Couleur</h1>
            <?php if($flag){
                echo "Bon endroit";
            }else{
                echo "Erreur d'acces";
            }?>
        </div>
    </main>

    <?php include("footer.php") ?>
</body>

</html>