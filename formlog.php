<?php
    session_start();

    //on enregister notre token
    $token = bin2hex(openssl_random_pseudo_bytes(64));
    $_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title></title>
        <?php include('header.php');?>
        
    </head>
    <body>
        
        <?php include('menu.php');?>
        <div class="container">
        <form action="login.php" method="POST">     <!--Mettre une action sinon il considère que c'est un get-->
            <div class="form-group mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="email" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="email@exemple.com">
                <div id="emailHelp" class="form-text">Votre Email habituel</div>
                
            </div>
            <div class="form-group mb-3">
                <label for="mdp" class="form-label">Password</label>
                <input type="password" class="form-control" id="mpd" name="mdp" placeholder="Password">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="souvenir" name="souvenir">
                <label class="form-check-label" for="souvenir">Se souvenir de mes identitfiants</label>
            </div>
            <input type="hidden" name="token" id="token" value="<?= $token;?>"> 
            <!-- input caché à l'utilisateur mais visible en clicdroit/inspecter-->
            <button type="submit" class="btn btn-info" id="btnconnect" name="btnconnect">Se connecter</button>
            
            </form>
            <?php
                $erreur = isset($_GET['erreur']) ? intval(nettoyer($_GET['erreur'])) : NULL;

                if (isset($erreur) and !empty($erreur)){ ?>
                    <div class="alert alert-danger">
                         <?= isset($erreur) ? affiche_erreur(nettoyer($erreur)) : 'Erreur inconnue' ?>
                    </div>      
            <?php } ?>
             
        </div>
        <?php include('footer.php');?>
    </body>
</html>