<?php
    session_start();

    //Busca SC
    function BuscaSc($lg, $snh){
        //chamando conexao
        require_once("conectBM.php");

        //guardando comando sql
        $sqlSlectSC = "SELECT Socio.codigoSocio, Socio.nomeDoSocio, Cargo.nomeDoCargo,Socio.emailSocio, Telefone.telefoneOne, Login.loginSocio FROM Socio INNER JOIN Cargo on Socio.codigoFKCargo = Cargo.codigoCargo INNER JOIN Login on Socio.codigoFKLogin = Login.codigoLogin INNER JOIN Telefone on Socio.codigoFKtelefone = Telefone.codigoTelefone WHERE loginSocio = '$lg' AND senhaSocio = '$snh'";
        $arrayValueSc = "";

        //Desenvolvendo script de execução
        $sqlExecut = $conn->query($sqlSlectSC);     //executando o comando sql

        $numberLinhas = $sqlExecut->num_rows;   //Retorno de linhas que o select fez

        //se vem algo ou não
        if($numberLinhas > 0){

            //Loop que vai percorrer todo resultado do select
            while($result = $sqlExecut->fetch_assoc()){
                
                $idSc = $result['codigoSocio'];
                $nomeSc = $result['nomeDoSocio'];
                $cargoSc = $result['nomeDoCargo'];
                $emailSc = $result['emailSocio'];
                $telefoneSc = $result['telefoneOne'];

                //guardando em um array
                $arrayValueSc = array($idSc, $nomeSc, $cargoSc, $emailSc,$telefoneSc);

            }
        }else{
            $arrayValueSc = false;
        }

        $conn->close();

        return $arrayValueSc;

    }

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

    //funcao logarUser
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

    //funcao logarSC
    function SocioLg($loginSc, $senhaSc){
        $valorSc = "";

        //guardando o valor da busca
        $valorSc = BuscaSc($loginSc, $senhaSc);

        //verificando se tem resultado
        if($valorSc === false){
            
            echo 1;

        }else{

            //criando session
            $_SESSION['userSC'] = $valorSc;

            echo "../PagesUser/userSocio.php";

        }

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

         //meta charset no banco
         $conn->set_charset("utf8");

         //convertendo os valores dos tipos
         $codCli = intval($codCli);
         $nome = strval($nome);
         $descricao = strval($descricao);

         //guardando os comandos sql
         $oSqlInsert = "INSERT INTO PEDIDO( CODIGOFKSCLIENTE, NOMEDOPEDIDO, DESCRICAOPEDIDO, DATAREALIZADO)VALUES( $codCli, '$nome', '$descricao', NOW())";

         if($conn->query($oSqlInsert) === true){

            echo "Pedido Cadastro com sucesso!!!";

         }else{

            echo "Erro ao executar o pedido!!!";

         }


     }

     /*fim*/

     /**
      * 
      *funcao Sc
      *
      */     

      //cadastrando projeto
      function CadastrarProjeto($nomeProjSc, $dateProjSc, $hourProjSc, $cliProjSc, $cpfProjSc, $descProjSc){
        //chamando o banco
        require_once("conectBM.php");

        //meta charset no banco
        $conn->set_charset("utf8");

        //resposta da busca
        $arrayCliente = "";

        //convertendo as houras
        $hourProjSc = floatval($hourProjSc);

        //comando sql
        $sqlSlectCli = "SELECT codigoCliente,cpfCliente, nomeDoCliente FROM Cliente WHERE cpfCliente = '$cpfProjSc'";
        $sqlExcut = $conn->query($sqlSlectCli);

        $sqlNumbRow = $sqlExcut->num_rows;      //numero de linhas que retornaram no select

        //verificando se veio algo do cliente
        if($sqlNumbRow > 0):
            
            while($result = $sqlExcut->fetch_assoc()){

                $cpfProjSc = $result['cpfCliente'];
                $codCliProjSc = $result['codigoCliente'];
                
                //se o nome que esta no cpf bate 
                if($result['nomeDoCliente'] != $cliProjSc){

                    $cliProjSc = $result['nomeDoCliente'];

                    //echo "são diferente os nomes!";

                }

                $arrayCliente = array(intval($codCliProjSc),$cliProjSc, $cpfProjSc);


            }
        
        else:
            
            $arrayCliente = false;
        
        endif; 
        
        //guardando o valor se existe o usuario no banco

        if( $arrayCliente === false):

            echo "O Cliente não existe, registra ele ou pede pra se cadastrar no site!!";

            exit;
        
        else:

            /**
             * 
             * Fazendo gambirra, pois esta muito complicado de alterar o banco
             * para colocar AUTO_INCREMENT, pois esqueci
             * 
             * */
            $sqlRegLst = "SELECT MAX(codigoProjeto) FROM Projeto";      //Busaca do ultimo registro feito
            
            $sqlExecut = $conn->query($sqlRegLst);
            
            $numberLinhas = $sqlExecut->num_rows;

            if($numberLinhas > 0){

                while($result = $sqlExecut->fetch_assoc()):

                    $regLast = $result['MAX(codigoProjeto)'];

                    $regLast = $regLast + 1;

                    $codProj = intval($regLast);

                endwhile;     

            }else{

                echo "Nada de registro Erro 404!!!";

            }
            /*fim*/
        endif; 

        //Comando de inserção
        $sqlIsertPj = "INSERT INTO Projeto(
            codigoProjeto,
            nomeDoProjeto,
            codigoFKCliente,
            dataDeTermino,
            dataDeInicio,
            horarioEstimadoDoProjeto,
            descricaoDoProjeto)VALUES(
                $codProj,
                '$nomeProjSc',
                $arrayCliente[0],
                '$dateProjSc',
                NOW(),
                $hourProjSc,
                '$descProjSc' )";
        //verificando se foi cadastrado
        if ($conn->query($sqlIsertPj) === TRUE) {

            echo "Projeto cadastro na tabela Projeto ";

            /**
             * GAMBIRRA DE NOVO EU NÃO AGUENTO MAIS, PORÉM O TEMPO ESTA CURTO
             * E TEM COISAS PRA REVER AHHAHAHAH
             * Fazendo gambirra, pois esta muito complicado de alterar o banco
             * para colocar AUTO_INCREMENT, pois esqueci.
             * 
             * */
            $sqlRegLst = "SELECT MAX(codigoProjSoc) FROM ProjetoSocio";      //Busaca do ultimo registro feito
            
            $sqlExecut = $conn->query($sqlRegLst);
            
            $numberLinhas = $sqlExecut->num_rows;

            if($numberLinhas > 0){

                while($result = $sqlExecut->fetch_assoc()):

                    $regLast = $result['MAX(codigoProjSoc)'];

                    $regLast = $regLast + 1;

                    $codPJS = intval($regLast);

                endwhile;     

            }else{

                echo "Nada de registro Erro 404(PJS)!!!";

            }
            //inserção na tabela socio 
            $sqlInsertPjS = "INSERT INTO ProjetoSocio(
                codigoProjSoc,
                codigoFKCargo,
                codigoFKProjeto,
                codigoFKArea)VALUES(
                    $codPJS,
                    1,
                    $codProj,
                    1)";

            if($conn->query($sqlInsertPjS) === true):

                echo "Registrado no ProjetoSocio";

            else:

                echo "Error: " . $sqlInsertPjS . " " . $conn->error;

            endif;    

          } else {
            echo "Error: " . $sqlIsertPj . " " . $conn->error;
          }
        


      }

      //busca pedido cliente
      function SearchPdCli($searchPd){
          //chamando a conexao do cliente
          require_once('conect.php');
          
          //CMD SQL
          $sqlSlctPd = "SELECT NOMEDOPEDIDO, DATAREALIZADO FROM PEDIDO WHERE NOMEDOPEDIDO LIKE '%$searchPd%'";
          
          //executando
          $sqlExcut = $conn->query($sqlSlctPd);   //busca especifico
          $numberRow = $sqlExcut->num_rows;

          //verificando se há registro
          if($numberRow > 0):
            
            echo'<table class="table">
            <thead class="#" style="background-color: #43528A; color: white;">
                <tr>
                    <th scope="col">Projeto</th>
                    <th scope="col">Data entrega</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="textColorPadrao">';
            
            while($result = $sqlExcut->fetch_assoc()){

                if($result['DATAREALIZADO'] == null){

                    $result['DATAREALIZADO'] = "20-11-10";

                }

                echo'<tr>
                <td>' . $result['NOMEDOPEDIDO'] . '</td>
                <td>Data entrega: ' . $result['DATAREALIZADO'] . '</td>
                <td>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Detalhes</button>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Aceitar</button>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Recusar</button>
                </td>
            </tr>';

            }

            echo '</tbody>
            </table>';
            
          else:
            
            echo"Nenhum resultado";

          endif;
          
          $conn->close();

      }

      //paginacao cliente
      function PaginacaoCli($pg,$pgBM){
          //chamando o banco do cliente
          require_once('conect.php');

          //valor da pagina
          if(!isset($_GET['pgCli'])){

            $_GET['pgCli'] = 1;

            $pagina = $_GET['pgCli'];

           }else{

                $pagina = $_GET['pgCli'];

           }
          //fim

          //CMD SQL
          $sqlSlect = "SELECT NOMEDOPEDIDO, DATAREALIZADO FROM PEDIDO";
          $sqlExecut = $conn->query($sqlSlect);
          $numberRowPg = $sqlExecut->num_rows;
          
          //variaveis da paginacao
          $qtdItensPg = 6;

          //limpando o resultado
          $sqlExecut->free_result();
          $sqlExecut = "";

          //calculando o numeros de pagina
          $numeroPgs = ceil($numberRowPg/ $qtdItensPg);

          //calculando o inicio dos itens
          $inicio = ($qtdItensPg * $pagina) - $qtdItensPg;

          //selecionando o que apresentar
          $sqlSlctItens = "SELECT NOMEDOPEDIDO, DATAREALIZADO FROM PEDIDO LIMIT $inicio, $qtdItensPg";
          $sqlExecut = $conn->query($sqlSlctItens);
          $totalItens = $sqlExecut->num_rows;

          if($totalItens > 0){
            echo'<table class="table">
            <thead class="#" style="background-color: #43528A; color: white;">
                <tr>
                    <th scope="col">Projeto</th>
                    <th scope="col">Data entrega</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="textColorPadrao">';

            while($result = $sqlExecut->fetch_assoc()){
                
                if($result['DATAREALIZADO'] == null){

                    $result['DATAREALIZADO'] = "20-11-10";

                }

                echo'<tr>
                <td>' . $result['NOMEDOPEDIDO'] . '</td>
                <td>Data entrega: ' . $result['DATAREALIZADO'] . '</td>
                <td>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Detalhes</button>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Aceitar</button>
                    <button type="submit"
                        class="btn btn-light border textColorPadrao">Recusar</button>
                </td>
                </tr>';
            }

            echo '</tbody>
            </table>';

            //verificando a pagina posterior e anterior
            $pg_after = $pagina - 1;
            $pg_before = $pagina + 1;

            echo'<nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">';

            //button anterior
            if($pg_after != 0):
                echo'<li class="page-item">
                <a class="page-link" href="userSocio.php?pg='.$pgBM.'&pgCli='.$pg_after.'" tabindex="-1" aria-disabled="true">Previous</a>
                </li>';
            else:
                echo'<li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>';
            endif;
            //fim

            //loop das page-itens
            for($i = 1; $i < $numeroPgs + 1; $i++):
                echo'<li class="page-item"><a class="page-link" href="userSocio.php?pg='.$pgBM.'&pgCli='.$i.'">'. $i .'</a></li>';
            endfor;
            //fim

            //button posterior
            if($pg_before <= $numeroPgs):
                echo'<li class="page-item">
                <a class="page-link" href="userSocio.php?pg='.$pgBM.'&pgCli='.$pg_before.'">Next</a>
                </li>';
            else:
                echo'<li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>';
            endif;

            echo'</ul>
            </nav>';


          }else{

            echo "Nenhum Resultado";

          }

          $conn->close();

      }


      //busca projeto bancoBM
      function SerachPj($search){
        //chamando o banco de dados  
        require_once("conectBM.php");
            
        //cmd sql
        $sqlSlctPj = "SELECT nomeDoProjeto, dataDeTermino, statusProjeto FROM Projeto WHERE nomeDoProjeto LIKE '%$search%' ";
            
            
        //Executando comandos
            
        $sqlExcut = $conn->query($sqlSlctPj);   //busca especifico
        $numberRow = $sqlExcut->num_rows;

        //verificando se vem algo
        if($numberRow > 0):

                //colocando table no php
                echo '<table class="table">
                <thead class="#" style="background-color: #43528A; color: white;">
                    <tr>
                        <th scope="col">Projeto</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="textColorPadrao">';
        
                //echo '<tbody class="textColorPadrao">';
        
                while($result = $sqlExcut->fetch_assoc()): 
        
                    if($result["statusProjeto"] == null){
        
                        $result["statusProjeto"] = "Em Desenvolvimento";
        
                    }
        
                    echo'<tr>
                    <td>' . $result["nomeDoProjeto"] . '</td>
                    <td class="text-success">' . $result["statusProjeto"] .' '. $result["dataDeTermino"] .' </td>
                    <td><button type="submit"
                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                    </tr>';
    
                endwhile; 
                
                echo "</tbody>";
                echo "</table>";   

            else:

                echo"Nenhum resultado";

            endif;
            
            $conn->close();

      }


?>