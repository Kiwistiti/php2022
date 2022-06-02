<?php
    //Fichier de vérification de langue


    if(!isset($_COOKIE["langue"]) AND !isset($_SESSION["langue"])){
        require_once("langue/EN.php");      //charge le fichier une fois
        $_SESSION["langue"] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        $_COOKIE["langue"] = $_SESSION["langue"];
    }
    elseif($_COOKIE["langue"]){
    
        $_COOKIE["langue"] = nettoyer($_COOKIE["langue"]);
        $_SESSION["langue"] = $_COOKIE["langue"];
        
        if ($_SESSION["langue"]){
            switch($_SESSION["langue"]){
                case "fr" or "en" or "it": 
                    require_once("langue/".strtoupper($_SESSION["langue"]).".php");
                    break;
                default:
                    require_once("langue/EN.php");
                    break;
                }
        }
    }

    
?>