<?php
    //Chamando a pagina de conexao
    require_once("conect.php");

    //desenvolvendo o script de insercao sql ou busca
    $login = $_POST['loginCpf'];
    $senha = $_POST['loginSenha'];

    //Script Mysql com php
    /*comando sql*/
    $sqlSlect = "SELECT Cliente.nomeCliente, Cliente.cpfCliente, Login.loginUser FROM Cliente, Login WHERE Cliente.cpfCliente = '$login' AND Login.senhaSocio = '$senha' ";

    //$sqlSlect = "SELECT Cliente.nomeCliente, Cliente.cpfCliente, Login.loginUser FROM Cliente, Login WHERE Cliente.codigoCliente = Login.codigoLogin";
    $sqlResult = $conn->query($sqlSlect);    //Executando no banco

    //Numero de resultado no banco encontrado
    $numberLinhas = $sqlResult->num_rows;

    //Tovendo se ele virou um obejeto mysqli e trouxe resultado
    /*if(is_object($numberLinhas)){
        die("isso é a contidade de dados do banco " + $numberLinhas);
    }else{
        echo $numberLinhas;
    }*/

    //se vai tem resultado ou não
    if($numberLinhas > 0){
        //Loop se tiver resultado
        while($resultado = $sqlResult->fetch_assoc()):
            
            echo"Nome: " . $resultado['nomeCliente'] . " Cpf: " . $resultado['cpfCliente'] . " Login: " . $resultado['loginUser'];

        endwhile;    
        
    }else{
        echo "resultado 0";
    }



?>