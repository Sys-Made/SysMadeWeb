<!DOCTYPE html>
<html>

<head>
    <title>User Socio</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, intial-scale=1.0">-->
    <link rel="stylesheet" href="../../Css/bootstrap.css">
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/bootstrap.css.map">
    <script type="text/javascript" src="../../Js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../Js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="../../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../../Js/bootstrap.min.js"></script>
</head>
<?php
 //chamando o banco do cliente
 require_once('../../Php/conectBM.php');

 //valor da pagina
 if(!isset($_GET['pgUpd'])){

   $_GET['pgUpd'] = 1;

   $pagina = $_GET['pgUpd'];

  }else{

       $pagina = $_GET['pgUpd'];

  }
 //fim

 //CMD SQL
 $sqlSlect = "SELECT * FROM Projeto";
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
 $sqlSlctItens = "SELECT * FROM Projeto LIMIT $inicio, $qtdItensPg";
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
       
    if($result["statusProjeto"] == null){

        $result["statusProjeto"] = "Em Desenvolvimento";

    }

       echo'<tr>
       <td>'.$result['nomeDoProjeto'].'</td>
       <td>Data entrega:'.$result['dataDeTermino'].'</td>
       <td>
           <button type="submit"
               class="btn btn-light border textColorPadrao">Detalhes</button>
           <button type="submit" class="btn btn-light border textColorPadrao"
               data-toggle="modal" data-target="#alterarProjeto">Alterar</button>
           <button type="submit"
               class="btn btn-light border textColorPadrao">Deletar</button>
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
       <a class="page-link" href="alterarProjeto.php?pgUpd='.$pg_after.'" tabindex="-1" aria-disabled="true">Previous</a>
       </li>';
   else:
       echo'<li class="page-item disabled">
       <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
       </li>';
   endif;
   //fim

   //loop das page-itens
   for($i = 1; $i < $numeroPgs + 1; $i++):
       echo'<li class="page-item"><a class="page-link" href="alterarProjeto.php?pgUpd='.$i.'">'. $i .'</a></li>';
   endfor;
   //fim

   //button posterior
   if($pg_before <= $numeroPgs):
       echo'<li class="page-item">
       <a class="page-link" href="alterarProjeto.php?pgUpd='.$pg_before.'">Next</a>
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




?>

<script type="text/javascript" src="../../Js/scriptBack.js"></script>

</html>