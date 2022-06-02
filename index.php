<?php
    session_start();
    
?>
<!doctype html>
<html lang="fr">

<head>
    <title>PHP</title>
    <?php include("header.php") ?>
</head>

<body>
    <?php include("menu.php") ?>
    <main>
        <div class="container">
            <!--<h1> Bienvenue sur mon site web</h1>
            <h2>Je vous souhaite une bonne navigation</h2>-->
                <?php

                var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                var_dump($_SESSION);  
                

                ?>
                <h1><?=_BIENVENUE?></h1>
                <h2><?=_BONNE_NAVIGATION?></h2>

                <?php
                
                echo "Ceci est un test";
                echo "<br>";
                echo "test \n \r test";
                echo "<br>";
                echo 'test \n \r test';
                echo ("<br> test <br");

                // Ligne 

                /*
                 Multi ligne
                */

                # commentaire
                ?>
                <p>Autres affichages :</p>
                sprintf();
                print_r();
            
            <h2><?= "Test"; ?></h2>
            <div class="container" data="<?php echo "test"; ?>"></div>
        </div>
    </main>

    <?php include("footer.php") ?>
</body>

</html>