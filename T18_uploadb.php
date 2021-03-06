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
        
       
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    $uploadOK = 1; 

                    //CONSTANTES
                    $nouveaunom = bin2hex(openssl_random_pseudo_bytes(16));     //Choisit le nom automatiquement                    
                    $dossier = "upload/";       //affectation du dossier
                    $extensionsAutorisees = array("jpg","png","gif","jpeg","webp");
                    $tailleAutorisee = 512000;

                    //Récup infos
                    $filename = $_FILES['file']['name'];
                    $nomTemp = $_FILES['file']['tmp_name'];
                    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));       //Récup l'extension du fichier
                    $tailleActuelle = $_FILES['file']['size'];            // ou $_FILES['file']['size'] avant


                    //S'assurer que fichier pas vide
                    if($nomTemp=="" && $tailleActuelle=="")
                    {
                        $uploadOK =0;
                        echo "Le fichier ne peut être nul <br>";
                    }

                    //test si fichier existe déjà
                    if(file_exists($dossier."/".$nouveaunom.".".$extension))
                    {
                        echo "Le fichier est déjà présent sur le serveur <br>";
                        $uploadOK = 0;
                    }

                    // Test si on peut upload
                    if ($uploadOK == 1)
                    {
                        if ($tailleActuelle < $tailleAutorisee)
                        {
                            if(in_array($extension, $extensionsAutorisees))
                            {
                                if (move_uploaded_file($nomTemp, $dossier."/".$nouveaunom.".".$extension)) // Envoye le fichier avec un nom provisoire vers le dossier avec son nom définitif
                                {
                                    echo "Fichier uploadé <br>";
                                    ?>
                                        <a href="<?= $dossier."/".$nouveaunom.".".$extension ?>" class="btn btn-dark">Lien vers le fichier uploadé</a>
                                    <?php
                                }
                                else
                                {
                                    echo " Fichier non uploadé <br>";
                                }
                            }
                            else
                            {
                                echo "Fichier non uploadé <br> Mauvaise extension <br>";
                            }
                        }    
                        else
                        {
                            echo "Fichier non uploadé <br> Mauvaise taille <br>";
                        }                    
                    }
                    else 
                    {
                        echo "Fichier non uploadé <br>";
                    }
                    
                }
                else 
                {
            ?>
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
            
            <?php } ?>
            <div class="container">
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
                <div id="images" class="row view-group">
                
                    <?php
                        $dossier = "upload/";
                        $fichiers = scandir($dossier);
                        //var_dump($fichier);
                        $imgID = 1;
                        foreach ($fichiers as $fichier)
                        {   
                            if($fichier=="." || $fichier==".." || $fichier=="index.html")
                            {
                                
                            }
                            else
                            {

                            ?>
                            <div class="item col-xs-6 col-lg-4">
                                <div class="thumbnail card">
                                    <div class="imgevent">
                                        <a id="<?=$imgID?>" href="<?=$dossier."/".$fichier?>" target="_blank">
                                            <img src="<?=$dossier."/".$fichier?>" alt="" class="group list-group img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $imgID++;
                            }
                        }
                    ?>

                </div>
            </div>
            <br><br><br>
        </div>
        <?php include("footer.php") ?>
    </body>
    <script>
        $(document).ready(function()
        {
            $('#list').click(function(event){
               event.preventDefault();      
               $('#images .item').removeClass('grid-group-item');
               $('#images .item').addClass('list-group-item');
            });

            $('#grid').click(function(event){
               event.preventDefault();
               $('#images .item').removeClass('list-group-item');
               $('#images .item').addClass('grid-group-item');
            });
        });
    </script>
</html>