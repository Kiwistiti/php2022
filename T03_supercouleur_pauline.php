<!doctype html>
<html lang="fr">

    <head>

    </head>
    <body>

    <?php
    if(isset($_SERVER['HTTP_REFERER']) === "http://".$_SERVER['SERVER_HOST']."/t03-superglobal.php"){
        if(isset($_GET["couleur"])){
            $couleur = strip_tags($_GET["couleur"]);
            $couleur = htmlentities($couleur);
            if($couleur == "rouge"){
                $flag = true;
            }
        }
    }
    ?>
    </body>
</html>