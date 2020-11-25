<?php
    $server = "seuServidor";
    $userDb = "usuario";
    $passDb = "senha";
    $bancoDb = "seubanco";

    $conn = new mysqli($server, $userDb, $passDb, $bancoDb);

    //Checando conexão
    if ($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }


?>
