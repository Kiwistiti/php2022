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
            <h1>Conditions</h1>
            <p>/ * - + %</p>
            <h2>Affectations</h2>
            <?php
                $nb1=5;
                $nb2=10;
                $total=0;

                $total=$nb1;
                $total+=$nb2;

                $total*=$nb2;
                $total2=17.5;
                $total2%=$nb2;
            ?>
            <p> == >> comparaison contenu</p>
            <p> === >> comparaison contenu + type </p>
            <?php 
                $nom="Josiane";
            ?>
            <?= (isset($nom) ? $nom : "inconnu")."<br>" ?>
            <?php 
                //feu de circulation >> URL = feu =vert ou orange ou rouge
                if(isset($_GET["feu"])){
                    $feu = htmlspecialchars($_GET["feu"]);
                    $feu = strip_tags($_GET["feu"]);
                    $feu = htmlentities($feu);

                    if($feu === "vert"){
                        echo "<p class='bg-success'>Avance</p>";
                    }else if($feu === "orange"){
                        echo "<p class='bg-warning'>Prudence</p>";
                    }else if($feu === "rouge"){
                        echo "<p class='bg-danger'>STOP</p>";
                    }else{
                        echo "Euuuh problème !";
                    }
                }else{
                    echo "Feux en panne";
                }
                
            ?>

            <h2>Switch</h2>

            <?php 

                $heure = date("H");         //Heure du serveur
                echo "Il est ". $heure." heure <br>";

                switch($heure)
                {
                    case ($heure > 6 && $heure < 10):
                        echo "Bonjour <br>";
                        break;

                    case ($heure >= 10 and $heure < 12):
                        echo "Bonne matinée <br>";
                        break;

                    case 12:                                //Pas besoin de tester car juste = 12
                        echo "Bon appétit <br>";
                        break;

                    case ($heure > 12 && $heure < 17):
                        echo "Bonne après-midi <br>";
                        break;

                    case ($heure >= 17):
                        echo "Bonne soirée <br>";
                        break;



                    default:
                        echo "Il est trop tard <br>";
                        break;

                }

            ?>
        </div>
    </main>

    <?php include("footer.php") ?>
</body>

</html>