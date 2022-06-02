<?php

try {

$bdd= new PDO('mysql:host=localhost;dbname=olympics','root','');
}
catch(Exception $e)
{
    die('Erreur '.$e->getMessage());
}
//var_dump($bdd);

?>