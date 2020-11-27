<?php
    $server = "localhost";
    $userDb = "admin";
    $passDb = "40028922+pokpok";
    $bancoDb = "bancoSite";

    $conn = new mysqli($server, $userDb, $passDb, $bancoDb);

    //Checando conexão
    if ($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }


?>
