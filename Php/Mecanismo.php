<?php
    session_start();
    //Busca de usuario
    function BuscaUsuario($loginBusc, $senhaBusc){
        //Chamando a pagina de conexao
        require_once("conect.php");

        //criando um lugar para guardar os dados do cliente
        $valoresUserArray = "";

        /*Desenvolvendo scrip sql com php*/

        //Fazendo a Busca busca do cliente
        $sqlSlect = "SELECT CLIENTE.CODIGOCLIENTE, CLIENTE.NOMECLIENTE, CLIENTE.EMAILCLIENTE, CLIENTE.EMPRESACLIENTE, LOGIN.LOGINUSER FROM CLIENTE, LOGIN WHERE CLIENTE.CPFCLIENTE = '$loginBusc' AND LOGIN.SENHASOCIO = '$senhaBusc' AND LOGIN.CODIGOLOGIN = CLIENTE.CODIGOCLIENTE";
        //$sqlSlect = "SELECT Cliente.nomeCliente, Cliente.emailCliente, Cliente.nomeDaEmpresaCliente,Login.loginUser FROM Cliente, Login WHERE Cliente.cpfCliente = '$loginBusc' AND Login.senhaSocio = '$senhaBusc'";
        
        $sqlResult = $conn->query($sqlSlect);       //Executando o comando sql no banco

        //numero de linhas
        $numberLinhas = $sqlResult->num_rows;       //se o num_rows estiver dando erro provavelment é o cmd sql

        //se vai tem resultado ou não
        if($numberLinhas > 0){
            //Loop se tiver resultado
            while($resultado = $sqlResult->fetch_assoc()):
                //guardando
                $nome = $resultado['NOMECLIENTE'];
                $user = $resultado['LOGINUSER'];
                $email = $resultado['EMAILCLIENTE'];
                $empresa = $resultado['EMPRESACLIENTE'];
                $idClient = $resultado['CODIGOCLIENTE'];

                

                //guardando os valores do usuario em uma array
                $valoresUserArray = array($idClient,$nome, $user, $email, $empresa);
    
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

    //funcao cadastro
    function cadastroClient($dataCad, $loginCad, $senhaCad){
        //Chamando a pagina de conexao
        require_once("conect.php");

        //para aramzenar
        $arrayDataUser = "";
        $respostaCadastro = "";
        
        //transformando $dataCad em array
        $arrayDataUser = explode(',', $dataCad);

        //obejetos sql guardando cmd sql
        $sqlSlectLg = "SELECT MAX(CODIGOLOGIN) FROM LOGIN";
        $sqlSlectEd = "SELECT MAX(CODIGOENDERECO) FROM ENDERECO";
        $sqlSlectTel= "SELECT MAX(CODIGOTELEFONE) FROM TELEFONE";
        $sqlIsertLg = "INSERT INTO LOGIN(LOGINUSER, SENHASOCIO)VALUES('$loginCad', '$senhaCad')";
        $sqlIsertEd = "INSERT INTO ENDERECO(
            RUA,
            BAIRRO,
            CIDADE,
            ESTADO,
            CEP,
            UF
        )VALUES(
            '$arrayDataUser[4]',
            '$arrayDataUser[5]',
            '$arrayDataUser[6]',
            'Sao Paulo',
            '$arrayDataUser[7]',
            '$arrayDataUser[8]'
        )";
        $sqlIsertTel = "INSERT INTO TELEFONE(TELEFONE1)VALUES('$arrayDataUser[9]')";
        $sqlIsertCli = "";

        //insert login
        if($conn->query($sqlIsertLg) === true){

            $respostaCadastro = "Foi cadastrado com sucesso login e a senha";

        }/*else{

            echo "Error: " . $sqlIsert . "<br>" . $conn->error;
        }*/

        //insert endereco
        if($conn->query($sqlIsertEd) === true){

            $respostaCadastro = "Foi cadastrado com sucesso endereco";

        }/*else{

            echo "Error: " . $sqlIsertEd . "<br>" . $conn->error;
        }*/

        //insert telefone
        if($conn->query($sqlIsertTel) === true){

            $respostaCadastro = "Foi cadastrado com sucesso Telefone";

        }/*else{

            echo "Error: " . $sqlIsertTel . "<br>" . $conn->error;
        }*/

        //puxando as chaves estrangeiras
        $resultLastIdLg = $conn->query($sqlSlectLg);
        $resultLastIdEd = $conn->query($sqlSlectEd);
        $resultLastIdTel = $conn->query($sqlSlectTel);
        
        if ($resultLastIdLg->num_rows > 0){
            
            //echo $resultLastIdLg;
            while($resultadoLg = $resultLastIdLg->fetch_assoc()){

                 $lgId = intval($resultadoLg['MAX(CODIGOLOGIN)']);

            } 

        }else{

            $respostaCadastro = "Error No SELECT Ultimo registro feito no login";

        }

        if($resultLastIdEd->num_rows > 0){

           //echo $resultLastIdLg;
            while($resultadoEd = $resultLastIdEd->fetch_assoc()){

                $edId = intval($resultadoEd['MAX(CODIGOENDERECO)']);
            
            }
        }else{

            $respostaCadastro = "Error No SELECT Ultimo registro feito no Endereco";
        }

        if($resultLastIdTel->num_rows > 0){

            //echo $resultLastIdLg;
             while($resultadoTel = $resultLastIdTel->fetch_assoc()){
 
                 $telId = intval($resultadoTel['MAX(CODIGOTELEFONE)']);
             
             }
         }else{
 
             $respostaCadastro = "Error No SELECT Ultimo registro feito no Telefone";
         }
         /*fim*/

         //Registrando o cliente
         $sqlIsertCli = "INSERT INTO CLIENTE(
             CPFCLIENTE,
             CNPJCLIENTE,
             EMPRESACLIENTE,
             NOMECLIENTE,
             CODIGOFKSLOGIN,
             CODIGOFKSENDERECO,
             CODIGOFKSTELEFONE
         )VALUES(
            '$arrayDataUser[1]',
            '$arrayDataUser[2]',
            '$arrayDataUser[3]',
            '$arrayDataUser[0]',
             $lgId,
             $edId,
             $telId
         )";

        
        //echo $sqlIsertCli;

        if($conn->query($sqlIsertCli) === true){

            $respostaCadastro = "Foi cadastrado com sucesso o Cliente";

        }/*else{

            echo "Error: " . $sqlIsertCli . "<br>" . $conn->error;
        }*/

        $conn->close();

        return $respostaCadastro;
        
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

                    echo 1;

                }else{
                    //criando uma sessão que vai possuir os dados do usuaraio
                    /**
                     * 
                     * Foreach é só usado em variaveis de matriz traduzindo arrays
                     * 
                     **/
                    /*$_SESSION["DataUser"] = $testeValor;

                    foreach($_SESSION["DataUser"] as $resultUser):
                        echo $resultUser . " ";
                    endforeach;*/

                    //criando a session,
                    $_SESSION["DataUser"] = $testeValor;

                    echo "../PagesUser/userCliente.php";        //enviando ao ajax pra ele poder mudar de pagina
                }

            }else{
                echo "Não foi a senha";
            }

        else:

            echo "Não Foi o Cpf";

        endif;    

    }

    //função deslogar
    function DesLogar($sair){
        
        session_unset();        //apagando os dados da sessão mas ela existe
        session_destroy();      // destruindo a sessão

        echo"../Pages/Login.html";

    }


    /**
     * 
     * Funcao do cliente
     * 
     */

     function RealizaPedido($codCli,$nome, $descricao){
         //requerindo a apgina de conexao
         require_once("conect.php");

         //convertendo os valores dos tipos
         $codCli = intval($codCli);
         $nome = strval($nome);
         $descricao = strval($descricao);

         //guardando os comandos sql
         $oSqlInsert = "INSERT INTO PEDIDO( CODIGOFKSCLIENTE, NOMEDOPEDIDO, DESCRICAOPEDIDO)VALUES( $codCli, '$nome', '$descricao')";

         if($conn->query($oSqlInsert) === true){

            echo "Pedido Cadastro com sucesso!!!";

         }else{

            echo "Erro ao executar o pedido!!!";

         }


     }


?>