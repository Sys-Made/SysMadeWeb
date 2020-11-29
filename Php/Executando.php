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

    }elseif(isset($_POST['activeSession'])){

        //Executando a função
        ExisteSesson($_POST['activeSession']);

    }elseif(isset($_POST['dataUserCad']) && isset($_POST['senhaCad']) && isset($_POST['loginCad'])){

        //Executando a funcao
        cadastroClient($_POST['dataUserCad'], $_POST['loginCad'], $_POST['senhaCad']);


    }elseif(isset($_POST['projNome']) && isset($_POST['projDescricao']) && isset($_POST['codCli'])){

        //executando a funcao
        RealizaPedido($_POST['codCli'],$_POST['projNome'], $_POST['projDescricao']);
    }


?>