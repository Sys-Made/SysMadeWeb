<?php
    //Busca de usuario
    function BuscaUsuario($loginBusc, $senhaBusc){
        //Chamando a pagina de conexao
        require_once("conect.php");

        /*Desenvolvendo scrip sql com php*/
        $sqlSlect = "SELECT Cliente.nomeCliente, Cliente.cpfCliente, Login.loginUser FROM Cliente, Login WHERE Cliente.cpfCliente = '$loginBusc' AND Login.senhaSocio = '$senhaBusc' ";
        
        $sqlResult = $conn->query($sqlSlect);       //Executando o comando sql no banco

        //numero de linhas
        $numberLinhas = $sqlResult->num_rows;       //se o num_rows estiver dando erro provavelment é o cmd sql

        //se vai tem resultado ou não
        if($numberLinhas > 0){
            //Loop se tiver resultado
            while($resultado = $sqlResult->fetch_assoc()):
                
                echo"Nome: " . $resultado['nomeCliente'] . " Cpf: " . $resultado['cpfCliente'] . " Login: " . $resultado['loginUser'];

            endwhile;    
            
        }else{
            echo "resultado 0";
        }
            
        }

    //Funcao validaCpf
    function validaSenha($senha){
        $resposta = "";

        if($senha <= 15 || $senha >= 6){

            $resposta = true;

        }else{
            $resposta = false;
        }

        return $resposta;
    }

    //funcao validaSenha
    function validaCpf($cpf){
        //variavel de resposta
        $resposta = "";

        //variavel que vai guardar o cpf
        $valido = preg_replace('/[^0-9]/',"", $cpf);

        //contando o numero de caracetres q tem
        $valido = strlen($valido);

        //verificando se tem os 11 numeros
        if($valido === 11){

            $resposta = true;
            
        }else{
            $resposta = false;
        }

        //returnando resposta da validação
        return $resposta;

    }

    //desenvolvendo o script de insercao sql ou busca
    function SessaoLogar($loginValue, $senhaValue){
        //variaveis locais
        $login = $loginValue;
        $senha = $senhaValue;

        //validando o cpf segunda vez
        if (validaCpf($login) === true):

            //validando a senha
            if(validaSenha($senha) === true){

                BuscaUsuario($login, $senha);

            }else{
                echo "Não foi a senha";
            }

        else:

            echo "Não Foi o Cpf";

        endif;    

        
        //echo "Esse são os valores " . $login . " " . $senha;

    }

    //Executando a função
    SessaoLogar($_POST['loginCpf'], $_POST['loginSenha']);

?>