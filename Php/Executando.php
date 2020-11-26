<?php
    //chamando o mecanismo
    require_once("Mecanismo.php");

    //verificando qual funcao sera usado
    if(isset($_POST['loginSenha']) && isset($_POST['loginCpf'])){

        //Executando a função
        SessaoLogar($_POST['loginCpf'], $_POST['loginSenha']);



    }elseif(isset($_POST['outSign'])){
        
        //Executando a função
        DesLogar($_POST['outSign']);

    }else{
        echo "nenhum dos dois";
    }



?>