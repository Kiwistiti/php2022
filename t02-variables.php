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
        <h1>Variables</h1>
        <h2>Récupére des données via get(passage par url)</h2>
        <p>
        <?php
            $url = filter_var($_GET["url"],FILTER_SANITIZE_URL);
            $email = filter_var($_GET["email"],FILTER_SANITIZE_EMAIL);
            echo $url."\n".$email."<br>";
            if ((isset($_GET["nom"])) || (isset($_GET["prenom"]))){
                $recupnom= strip_tags($_GET["nom"]);
                $recupprenom= strip_tags($_GET["prenom"]);
                // htmlentities
                $recupnom = htmlentities($recupnom);
                $recupprenom = htmlspecialchars($recupprenom); // prioritaire
                $recupnom = trim($recupnom);
                $recupprenom = trim($recupprenom);
                if(($recupnom != '' ) || ($recupprenom != '' )){
                    echo "Bienvenue ".$recupprenom." ".$recupnom; 
                } else {
                    echo "Bienvenue inconnu.e";
                }
                
            } else
            {
                echo "Mauvaise origine";
            }
        ?>
        </p>
        
    </div>
    </main>
    <?php include("footer.php") ?>
  </body>
</html>