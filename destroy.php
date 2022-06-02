<?php

    //Pour des éléments de Session
    session_start();
    session_destroy();

    //Supprimer les cookies
    setcookie('couleur', NULL, -42000); 
    setcookie('langue', NULL, -42000);
    $_SESSION['langue'] = 'en';
    //$_SESSION["langue"] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    setcookie('couleur', NULL, -42000); 
    setcookie('langue', NULL, -42000);
    setcookie('login', NULL, -42000);
    setcookie('mdp', NULL, -42000);
    setcookie('souvenir', NULL, -42000);
    setcookie('token', NULL, -42000);

    header("location:index.php");       //HTTP referer de la page à renvoyer
?>

