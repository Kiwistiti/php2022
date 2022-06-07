<?php
    require('functionnettoyer.php');
    $value = nettoyer($_GET['ligne']);
    
        switch($value){
            case 1: 
                echo "Fondée par Bill Gates";
                break;
            case 2: 
                echo "Fondée par Linux Torvald";
                break;
            case 3: 
                echo "Fondée par Steve Jobs";
                break;
            default:
                break;
        }
    

?>