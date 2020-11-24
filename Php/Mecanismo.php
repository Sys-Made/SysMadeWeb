<?php
    //Chamando a pagina de conexao
    require_once("conect.php");

    //desenvolvendo o script de insercao sql ou busca
    $login = $_POST['loginCpf'];
    $senha = $_POST['loginSenha'];

    //Script Mysql com php
    /*comando sql*/
    $sqlSlect = "SELECT $login, $senha FROM Cliente, Login WHERE Cliente.codigoCliente = Login.codigoLogin";
    /*$sqlSlect = "SELECT Cliente.nomeCliente, Cliente.cpfCliente, Login.loginUser FROM Cliente, Login WHERE Cliente.codigoCliente = Login.codigoLogin";
    $sqlResultado = $conn->query($sqlSlect);    //Executando no banco

    //se vai tem resultado ou não
    if($sqlResultado->num_rows > 0){
        //Loop se tiver resultado
        while($resultado = $sqlResultado->fetch_assoc()):
            
            echo"Nome: " . $resultado['nomeCliente'] . " Cpf: " . $resultado['cpfCliente'] . " Login: " . $resultado['loginUser'];

        endwhile;    
        
    }else{
        echo "resultado 0";
    }*/



?>