<?php
    //iniciando sessão
    session_start();

    /**
     * 
     * Fazendo ele voltar para a tela de login caso essa sessões não foram inciadas
     * 
     * */

    if(!isset($_SESSION["userSC"])){
        
        header("Location: ../Pages/Login.html");        //Header com location direciona a pagina
        
        exit;   //Ele pode enviar mensagem e terminar o script
    }  
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Socio</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, intial-scale=1.0">-->
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/bootstrap.css.map">
    <script type="text/javascript" src="../Js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../Js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <!--cabecarioUsuarioCliente-->
    <header class="container-fluid bg-light userBoxShadow">
        <div class="row justify-content-end">
            <div class="col-8 text-left">
                <div class="#">
                    <img class="#" src="../Img/logo/LogotipoNew.png" alt="logo_da_empresa" width="180" height="110">
                </div>
            </div>

            <div class="col">
                <div class="float-left p-3">
                    <img class="d-inline-block shadow rounded-circle" src="../Img/Icones/user.png" alt="foto_usuario"
                        width="80" height="80">

                    <h6 class="d-inline-block mx-5 textColorPadrao"><?php echo $_SESSION['userSC'][1];?></h6> <!-- nome do login -->

                    <div class="btnSair d-inline-block shadow" style="cursor: pointer;" onclick="sairLogin();">
                        <img class="d-inline-block" src="../Img/Icones/sair.png" alt="foto_usuario">
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- fimCabecario -->

    <!-- socioDados -->
    <section class="container-fluid my-4">
        <div class="row">
            <div class="col-6">
                <article class="dataSocio border shadow">

                    <div class="fotoUserSocio text-center"></div>

                    <div class="dadosUserSocio p-2 textColorPadrao bg-light">
                        <h6><?php echo $_SESSION['userSC'][1];?></h6><!-- nome do socio -->

                        <h6><?php echo $_SESSION['userSC'][2];?></h6><!-- cargo -->

                        <h6><?php echo $_SESSION['userSC'][3];?></h6><!-- email -->

                        <h6><?php echo $_SESSION['userSC'][4];?></h6><!-- telefone -->
                    </div>
                </article>
            </div>

            <div class="col-6">
                <article class="dadosProjeto border shadow">
                    <h2 class="text-center textColorPadrao">Projetos Em Andamento</h2>

                    <div class="listaProjeto my-4 text-center">
                        <table class="table">
                            <thead class="#" style="background-color: #43528A; color: white;">
                                <tr>
                                    <th scope="col">Projeto</th>
                                    <th scope="col">Data entrega</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="textColorPadrao">

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>

                                <tr>
                                    <td>Projeto Nome</td>
                                    <td>10/08/20</td>
                                    <td><button type="submit"
                                            class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </article>
            </div>
        </div>
    </section>
    <!-- fimSocioDados -->

    <!-- funcaoUsuario -->
    <section class="container-fluid bg-light">
        <div class="row">
            <div class="col">
                <!-- tablist -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#addProjeto" role="tab"
                            aria-controls="home" aria-selected="true">Adicionar Projeto</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#complProjeto" role="tab"
                            aria-controls="profile" aria-selected="false">Projetos Concluidos</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#cancelProjeto" role="tab"
                            aria-controls="profile" aria-selected="false">Projetos Cancelados</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#esperaPedido" role="tab"
                            aria-controls="profile" aria-selected="false">Pedido Em espera</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#updateProjeto" role="tab"
                            aria-controls="contact" aria-selected="false">Aletrar Projetos</a>
                    </li>
                </ul>

                <!-- adicionarProjeto -->
                <div class="tab-content shadow border-top-0 p-3 textColorPadrao" id="myTabContent">

                    <div class="tab-pane fade show active" id="addProjeto" role="tabpanel" aria-labelledby="home-tab">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Nome Do Projeto:</label>
                                    <input type="text" class="form-control" id="nomeProjeto"
                                        placeholder="exemplo nome: Adminiscar">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Data Entrega:</label>
                                    <input type="date" class="form-control" id="dateEntrega">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Horas Estimadas</label>
                                    <input type="text" class="form-control" id="horasEstim" placeholder="17500">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Nome do Cliente:</label>
                                    <input type="text" class="form-control" id="nomeCliente"
                                        placeholder="exemplo nome: Carlos Pereira Silva">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Cpf:</label>
                                    <input type="text" class="form-control" id="cpfCliente"
                                        placeholder="exemplo cpf: 123.654.789-89">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição Do Projeto:</label>
                                <textarea class="form-control" id="descricaoProjeto" rows="5"></textarea>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-1">
                                    <button type="button"
                                        class="btn btn-light border textColorPadrao" onclick="RegistraProjeto();">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ProjetoCompleto -->
                    <div class="tab-pane fade p-3" id="complProjeto" role="tabpanel" aria-labelledby="profile-tab">

                        <!-- buscaProjeto -->
                        <form>
                            <div class="form-row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Faça sua busca aqui....">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-light border textColorPadrao">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- fimBuscaProjeto -->

                        <!-- resultados-->
                        <div class="listaProjeto my-4 text-center">
                            <table class="table">
                                <thead class="#" style="background-color: #43528A; color: white;">
                                    <tr>
                                        <th scope="col">Projeto</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="textColorPadrao">

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-success">Finalizado: 12/09/20</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- fimResultados -->

                        <!-- paginacao -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- fimPaginacao -->
                    </div>

                    <!-- ProjetoCancelados -->
                    <div class="tab-pane fade p-3" id="cancelProjeto" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- buscaProjeto -->
                        <form>
                            <div class="form-row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Faça sua busca aqui....">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-light border textColorPadrao">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- fimBuscaProjeto -->

                        <!-- resultados-->
                        <div class="listaProjeto my-4 text-center">
                            <table class="table">
                                <thead class="#" style="background-color: #43528A; color: white;">
                                    <tr>
                                        <th scope="col">Projeto</th>
                                        <th scope="col">Motivo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="textColorPadrao">

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td class="text-danger">Falta de Recurso</td>
                                        <td><button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- fimResultados -->

                        <!-- paginacao -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- fimPaginacao -->
                    </div>

                    <!-- PedidosEmEspera -->
                    <div class="tab-pane p-3" id="esperaPedido" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- buscaProjeto -->
                        <form>
                            <div class="form-row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Faça sua busca aqui....">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-light border textColorPadrao">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- fimBuscaProjeto -->

                        <!-- resultados-->
                        <div class="listaProjeto my-4 text-center">
                            <table class="table">
                                <thead class="#" style="background-color: #43528A; color: white;">
                                    <tr>
                                        <th scope="col">Projeto</th>
                                        <th scope="col">Data entrega</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="textColorPadrao">

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Aceitar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Recusar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- fimResultados -->

                        <!-- paginacao -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- fimPaginacao -->
                    </div>

                    <!-- PedidosUpdate -->
                    <div class="tab-pane p-3" id="updateProjeto" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <!-- buscaProjeto -->
                        <form>
                            <div class="form-row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Faça sua busca aqui....">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-light border textColorPadrao">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- fimBuscaProjeto -->

                        <!-- resultados-->
                        <div class="listaProjeto my-4 text-center">
                            <table class="table">
                                <thead class="#" style="background-color: #43528A; color: white;">
                                    <tr>
                                        <th scope="col">Projeto</th>
                                        <th scope="col">Data entrega</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="textColorPadrao">

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Projeto Nome</td>
                                        <td>Data entrega: 10/11/20</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Detalhes</button>
                                            <button type="submit" class="btn btn-light border textColorPadrao"
                                                data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
                                            <button type="submit"
                                                class="btn btn-light border textColorPadrao">Deletar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- fimResultados -->

                        <!-- paginacao -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- fimPaginacao -->
                    </div>

                </div>
                <!-- fimTablist -->
            </div>
        </div>
    </section>
    <!-- fimFuncaoUsuario -->

    <!--Modal-->
    <div class="modal fade textColorPadrao" id="alterarProjeto" tabindex="-1" aria-labelledby="alterarProjeto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alterarProjeto">Alterar Projeto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Nome Do Projeto</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="exemplo name: adminiscar">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Data Entrega</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Horas Estimadas</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="exemplo name: adminiscar">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição Do Projeto</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <!-- fim -->

    <!--rodapé-->
    <footer class="container-fluid bg-light userBoxShadowTop mt-4">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img class="#" src="../Img/logo/LogotipoNew.png" alt="logo_da_empresa" width="150" height="100">
            </div>
        </div>
    </footer>
    <!-- fimRodapé -->

    <script type="text/javascript" src="../Js/scriptBack.js"></script>

    <!-- version do sistema -->
    <div class="versao">
        <p><b>ALPHA</b>V0.2.1</p>
    </div>
    <!-- fim -->
</body>

</html>