<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
    <title>User Cliente</title>
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

                    <h6 class="d-inline-block mx-5 textColorPadrao"><?php echo $_SESSION['nomeLoginUser'];?></h6>

                    <div class="btnSair d-inline-block shadow teste" style="cursor: pointer;" onclick="sairLogin();">
                        <img class="d-inline-block" src="../Img/Icones/sair.png" alt="foto_usuario">
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- fimCabecario -->

    <!-- userDados -->
    <section class="container-fluid my-4">
        <div class="row my-3">
            <div class="col-6">
                <article class="dataUsuario p-0 shadow">
                    <div class="fotoUser p-2 text-center border">
                        <img class="bg-light rounded-circle" src="../Img/portfolio/patric.jpeg" alt="fotoUsuario">
                    </div>

                    <div class="dadosUser p-3 border textColorPadrao">
                        <h6><?php echo $_SESSION['nomeRealUser'];?></h6>

                        <h6>Microsolft Brasil</h6>

                        <h6>microsolftoficial2020@outlook.com</h6>
                    </div>
                </article>
            </div>

            <div class="col-6">
                <article class="dadosPedidos border shadow">
                    <h2 class="text-center textColorPadrao">Pedidos em Desenvolvimento</h2>

                    <div class="listaPedidos my-4 text-center">
                        <img src="../Img/Icones/web-development.png" alt="emDesenvolvimento">
                        <h1 class="text-center textColorPadrao">Em Desenvolvimento</h1>
                    </div>

                </article>
            </div>
        </div>
    </section>
    <!-- fimUserDados -->

    <!-- funcaoUsuario -->
    <section class="container-fluid bg-light">

        <!-- tablist -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Fazer Pedido</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Pedido Em espera</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Configuração</a>
            </li>
        </ul>
        <div class="tab-content shadow border-top-0 p-3 textColorPadrao" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-light border textColorPadrao">Submit</button>

                </form>
            </div>

            <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h1 class="text-center">Em Desenvolvimento</h1>
            </div>

            <div class="tab-pane fade p-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h1 class="text-center">Em Desenvolvimento</h1>
            </div>
        </div>
        <!-- fimTablist -->
    </section>
    <!-- fimFuncaoUsuario -->

    <!--rodapé-->
    <footer class="container-fluid bg-light userBoxShadowTop mt-4">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img class="#" src="../Img/logo/LogotipoNew.png" alt="logo_da_empresa" width="150" height="100">
            </div>
        </div>
    </footer>
    <!-- fimRodapé -->

    <!-- version do sistema -->
    <div class="versao">
        <p><b>ALPHA</b>V0.2.1</p>
    </div>
    <!-- fim -->

    <script type="text/javascript" src="../Js/scriptBack.js"></script>
</body>

</html>