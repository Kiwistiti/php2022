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
                <form action="T18_upload.php" method="post" enctype="multipart/form-data">   <!--enctype pour dire qu'il va receptionner un fichier-->
                    <div class="form-group">
                        <label for="file">Sélectionner un ficher</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                        <button type="submit" class="btn btn-warning" value="Upload Image" name="btnUpload">Upload file</button>
                    </div>
                </form>
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

                    if($verifier != false)
                    {
                        echo "Ce fichier est de type ".$verifier["mime"]."<br>";
                    }
                    else
                    {
                        echo "Mauvaise extension !";
                        $uploadOK = 0;
                    }

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