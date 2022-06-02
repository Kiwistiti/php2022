<?php

function nettoyer ($donnees){
    $donnees = trim($donnees);
    $donnees = stripcslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

/*$test = "<script>alert('je suis un h@cker HAHAHA # !!!')</script>";
echo $test;
$testnettoye = nettoyer($test);
echo $testnettoye;*/

?>

