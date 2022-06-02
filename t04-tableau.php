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
            <h1>Tableau</h1>
            <p>exemple > $nom[num]</p>

            <?php
                $pays[]="Belgique";
                $pays[]="France";
                $pays[]="Suisse";
                $pays[]="Canada";

                echo $pays[2]."<br>";
                
                $prenoms = array("Jules", "Odéon", "Nestor", "Gertrude");
                echo $prenoms[1]."<br>";
            ?>
            <h2>Tableaux associatifs</h2>
            <?php 
                $ecole["Nom"]="EPS Péruwelz";
                $ecole["Adresse"]="Boulevard Léopold III, 40 - 7600 Péruwelz";
                $ecole["Téléphone"]="+3269771035";    
            ?>
            <p><?= $ecole["Nom"] ?></p>

            <?php 
                $countries = array('BE' => "Belgique",'FR' => "France",'LU' => "Luxembourg",'CH' => "Suisse");
            ?>
            <p><?= $countries["CH"] ?></p>

            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <th>Code ISO</th>
                    <th>Pays</th>
                </thead>
                <tbody>
                    <?php foreach($countries as $iso => $nomPays) { ?>
                        <tr>
                            <td><?= $iso ?></td>
                            <td><?= $nomPays ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2>Trier un tableau</h2>
            <?php 
                $nombres = array(5,1,4,8,9,2,3,7,10,2);
                foreach($nombres as $nombre){
                    echo $nombre."<br>";
                }
                echo "<hr>";
                sort($nombres);
                foreach($nombres as $nombre){
                    echo $nombre." ";
                }
            ?>
            <h2>Compter les items du tableau</h2>
            <?= count($pays); ?>
        </div>
    </main>

    <?php include("footer.php") ?>
</body>

</html>