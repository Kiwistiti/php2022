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

        <?php
        $nom = "Dupont";
        $age = 97;
        $poids = 78.6;
        $drapeau = true;
        $test = NULL;
        $txt_prenom = "Alexandre";

        echo "<p> Le nom de famille est $nom </p>";
        ?>
        <p><?php echo "<p> Le nom de famille est $nom </p>"; ?></p>
        <h2>Global / Locale</h2>
        <?php
        #unset($nom);
        var_dump($nom);
        $nom = "Durant";

        function afficheNom($nom)
        {
            echo "<p> Votre nom est $nom</p>";
        }

        afficheNom($nom);

        function AffichePoids()
        {
            $poids2 = 80;
            echo "<p>Votre poids est " . $poids2 . "</p>";
            return $poids2;
        }

        $poids2 = AffichePoids();
        var_dump($poids2);

        $nb1 = 15;
        $nb2 = 30;

        function Total()
        {
            global $nb1, $nb2, $somme;
            $somme = $nb1 + $nb2;
        }

        Total();
        echo "<p>Le total est de " . $somme . "</p>";

        $nb1 = 20;
        $nb2 = 40;
        unset($somme);

        function TotalB()
        {
            $GLOBALS["somme"] = $GLOBALS["nb1"] + $GLOBALS["nb2"];
        }

        TotalB();
        echo "<p>Le total est de " . $somme . "</p>";

        function Compte()
        {
            static $x = 0;
            echo "<p>" . $x . "</p>";
            $x++;
        }

        Compte();
        Compte();
        Compte();
        Compte();
        Compte();

        unset($poids);
        var_dump(isset($poids));
        echo "<br>";
        var_dump(empty($nb1));
        echo "<br>";
        $b = 100;

        echo $a ?? 5;
        echo "<br>";
        echo $a ?? $b ?? 10;
        ?>

        <h2>Orienté Objet</h2>
        <?php
        class Voiture
        {
            function __construct()
            {
                $this->marque = "Porche";
                $this->modele = "Taycan";
            }
        }
        $nouvelleVoiture = new Voiture();

        echo "<p>Marque : " . $nouvelleVoiture->marque . "</p>\n
                      <p>Modele : " . $nouvelleVoiture->modele . "</p>";
        ?>
        <h2>Manipulation String</h2>
        <p>Longueur du prénom</p>
        <?php echo strlen($txt_prenom); ?>
        <p>inverser une chaine</p>
        <?php echo strrev($txt_prenom); ?>
        <p>Position d'un mot dans un texte</p>
        <?php
        $message = "Ceci est un texte dans le message";
        echo strpos($message, "dans") + 1;
        ?>
        <p>Compter le nombre de mots</p>
        <?php echo str_word_count($message) ?>
        <p>Majuscule</p>
        <?php echo strtoupper($message); ?>
        <p>Minuscule</p>
        <?php echo strtolower($message); ?>
        <p>Premiere majuscule</p>
        <?php echo ucfirst($message); ?>
        <p>Capitalize</p>
        <?php echo ucwords($message); ?>

        <h2>Constante</h2>
        <?php
        define("COULEUR", "red");
        $couleur = "blue";

        function AfficheCouleur($color)
        {
            echo '<div style="width:100px;height:100px;background-color:' . $color . ';"> </div>';
        }
        AfficheCouleur($couleur);
        AfficheCouleur(COULEUR);
        ?>
        <a href="t02-variables.php?prenom=Gertrude&nom=Dumoulin" class="btn btn-primary">Transfert</a>
    </div>
    </main>
    <?php include("footer.php") ?>
  </body>
</html>