<?php
    //Busca de usuario
    function BuscaUsuario($loginBusc, $senhaBusc){
        //Chamando a pagina de conexao
        require_once("conect.php");

        //criando um lugar para guardar os dados do cliente
        $valoresUserArray = "";

        /*Desenvolvendo scrip sql com php*/

        //Fazendo a Busca busca do cliente
        $sqlSlect = "SELECT Cliente.nomeCliente, Cliente.cpfCliente, Login.loginUser FROM Cliente, Login WHERE Cliente.cpfCliente = '$loginBusc' AND Login.senhaSocio = '$senhaBusc' ";
        
        $sqlResult = $conn->query($sqlSlect);       //Executando o comando sql no banco

        //numero de linhas
        $numberLinhas = $sqlResult->num_rows;       //se o num_rows estiver dando erro provavelment é o cmd sql

        //se vai tem resultado ou não
        if($numberLinhas > 0){
            //Loop se tiver resultado
            while($resultado = $sqlResult->fetch_assoc()):
                //guardando
                $nome = $resultado['nomeCliente'];
                $user = $resultado['loginUser'];
                

                //guardando os valores do usuario em uma array
                $valoresUserArray = array($nome, $user);
    
            endwhile;
            
        }else{

            $valoresUserArray = false;
        }

        $conn->close();

        return $valoresUserArray;
        
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

                //verificando se a funcao veio com array
                $testeValor = BuscaUsuario($login, $senha);
                if($testeValor === false){

                    echo"Erro no login ou usuario";

                }else{
                    /**
                     * 
                     * Foreach é só usado em variaveis de matriz traduzindo arrays
                     * 
                     */
                    /*foreach($testeValor as $resultUser):
                        echo "$resultUser[0]";
                    endforeach;*/
                    //criando a session
                    session_start();
                    $_SESSION['nomeRealUser'] = $testeValor[0];
                    $_SESSION['nomeLoginUser'] = $testeValor[1];

                    echo "../PagesUser/userCliente.php";
                }

            }else{
                echo "Não foi a senha";
            }

        else:

            echo "Não Foi o Cpf";

        endif;    

    }

    //função deslogar

    //Executando a função
    SessaoLogar($_POST['loginCpf'], $_POST['loginSenha']);

?>