<?php
    //chamando o mecanismo
    require_once("Mecanismo.php");

    //verificando qual funcao sera usado
    if(isset($_POST['loginSenha']) && isset($_POST['loginCpf'])){

        //Executando a função
        SessaoLogar($_POST['loginCpf'], $_POST['loginSenha']);

    }elseif(isset($_POST['loginSC']) && isset($_POST['senhaSC'])){

        //executando a funcao
        SocioLg($_POST['loginSC'], $_POST['senhaSC']);

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

    }elseif(isset($_POST['projNameSc']) && isset($_POST['projDateSc']) && isset($_POST['projHourSc']) && isset($_POST['projCliSc']) && isset($_POST['projCpfCli']) && isset($_POST['projDescSc'])){

        //executando funcao
        CadastrarProjeto($_POST['projNameSc'],$_POST['projDateSc'],$_POST['projHourSc'], $_POST['projCliSc'], $_POST['projCpfCli'], $_POST['projDescSc']);

    }elseif(isset($_POST['codPj']) || isset($_POST['codCli'])){

        //executando funcao
        Detalhes($_POST['codPj'], $_POST['codCli']);

    }elseif(isset($_POST['codpj']) || isset($_POST['codcli']) || isset($_POST['nomePj']) || isset($_POST['statusPj']) || isset($_POST['datePj']) || isset($_POST['horasPj']) || isset($_POST['descriPj'])){

        //executando funcao
        AlteraData($_POST['codpj'], $_POST['codcli'], $_POST['nomePj'], $_POST['statusPj'], $_POST['datePj'], $_POST['horasPj'], $_POST['descriPj']);
    }   

?>