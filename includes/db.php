<?php
    $servernme = "localhost";
    $username = "root";
    $password = "";
    $dbname = "planning_db";
    //connexion
    $conn = new mysqli ($servernme ,$username,$password ,$dbname );
    if ( $conn -> connect_error){
        die ("echec de la connexion :" .$conn -> connect_error);
    }
?>    