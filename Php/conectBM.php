<?php
    $server = "seuServe";
    $userDb = "seuUsuario";
    $passDb = "suaSenha";
    $bancoDb = "seuBanco";

    $conn = new mysqli($server, $userDb, $passDb, $bancoDb);

    //Checando conexão
    if ($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }


?>
