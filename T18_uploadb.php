<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>Uploader un fichier | Init PHPMySQL</title>
        <?php include("header.php") ?>
    </head>
    <body>
        <?php include("menu.php") ?>
        <div class="container">
            <h1>Upload d'un fichier - TEST</h1>
            <div class="container">
                <form action="T18_uploadb.php" method="post" enctype="multipart/form-data">   <!--enctype pour dire qu'il va receptionner un fichier-->
                    <div class="form-group">
                        <label for="file">Sélectionner un ficher</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value=512000>     A éviter car petit malin peut modifier la value  -->
                        <button type="submit" class="btn btn-warning" value="Upload Image" name="btnUpload">Upload file</button>
                    </div>
                </form>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 my-3">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-info" id="list">List View</button>
                                <button class="btn btn-danger" id="grid">Grid View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    var_dump($_FILES);
                    $uploadOK = 1;              //Bool => Tant que tout est bon sinon 0 => pas d'upload
                    //Extraction des infos dossier fichier et extention
                    $dossier = "upload/";       //affectation du dossier
                    $fichier = $dossier.basename($_FILES["file"]["name"]);
                                        // Basename est une fonction qui permet de mettre le nom d'un fichier

                    
                    $imagetype = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));       //Récup l'extension du fichier
                    //var_dump($imagetype); 
                    //Vérification de l'extension
                    $verifier = getimagesize($_FILES["file"]["tmp_name"]);
                    //var_dump($verifier);

                    //Test pour vérifier le type du fichier
                    if($verifier != false)
                    {
                        echo "Ce fichier est de type ".$verifier["mime"]."<br>";
                    }
                    else
                    {
                        echo "Mauvaise extension ! <br>";
                        $uploadOK = 0;
                    }

                    //test si fichier existe déjà

                    if(file_exists($fichier))
                    {
                        echo "Le fichier est déjà présent sur le serveur";
                        $uploadOK = 0;
                    }

                    //Vérifier si taille requise
                    if($_FILES["file"]["size"] > 512000)            //Plus petite que +- 500ko   ou avec $verifier["size"]
                    {
                        echo "Votre fichier est trop gros";
                        $uploadOK = 0;
                    }

                    //vérifier l'extension
                    if($imagetype !="jpg" && $imagetype !="png" && $imagetype !="gif" && $imagetype !="jpeg")
                    {
                        echo "L'image n'a pas la bonne extension";
                        $uploadOK = 0;
                    }

                    // Test si on peut upload
                    if ($uploadOK == 0)
                    {
                        echo "Votre fichier n'est pas uploadé";                        
                    }
                    elseif (move_uploaded_file($_FILES["file"]["tmp_name"],$fichier)) // Envoye le fichier avec un nom provisoire vers le dossier avec son nom définitif
                    {
                        echo "Fichier uploadé";
                        ?>
                            <a href="<?= $fichier ?>" class="btn btn-dark">Lien vers le fichier uploadé</a>
                        <?php
                    }
                    
                }
            ?>
            <br><br><br>
        </div>
        <?php include("footer.php") ?>
    </body>
</html>