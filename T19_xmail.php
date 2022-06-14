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
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" AND (isset($_SERVER['HTTP_REFERER'])=="http://php.test/T19_xmail.php")) 
                {

                    //Nettoyage
                    filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);      //Autre méthode de nettoyage
                    $email = nettoyer($_POST['email']);
                    $message = nettoyer($_POST['message']);
                    $sujet=date("Y-m-d")."- Demande de renseignements";
                    
                    //vérif si adresse mail remplie
                    if(!empty($email)){
                        //fonction basique d'envoi de mail ou utiliser PHPMailer (library sur Git)
                        $envoi = @mail($email,$sujet,$message);          //@ supprime le message d'erreur une fois l'envoi du mail
                        
                        if($envoi)
                            echo "Mail envoyé";
                        else
                            echo "Echec d'envoi du mail";
                        
                    }

                }
                else 
                {
            ?>
            </div>
            <div class="container">
            <h1>Envoyer mail</h1>
            <form action="T19_xmail.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoi e-mail</button>
            </form>
            <?php } ?>
            
            <br><br><br>
        </div>
        <?php include("footer.php") ?>
    </body>
</html>