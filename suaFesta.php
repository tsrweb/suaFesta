<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

require "conecta.php";
require "chkMsg.php";

$idFesta = $_GET['idFesta'];

$con = $link->query("SELECT * FROM tb_festa WHERE id_festa = '$idFesta'");

while($reg1 = $con->fetch_array()){

$nomeFesta  = $reg1['nm_festa'];
$nomeAniver = $reg1['nm_aniversariante'];
$dataFesta  = $reg1['dt_dataFesta'];
$horaFesta  = $reg1['hr_horaFesta'];
$cidade     = $reg1['nm_cidade'];
$bairro     = $reg1['nm_bairro'];
$logradouro = $reg1['te_logradouro'];
$logNum     = $reg1['nu_numero'];
$imgPerfil  = $reg1['img_perfil'];
      };
?>
<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Festa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/teste.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php include "navBar.php";?>

<div class="container-fluid">
  <div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
  	<ul class="nav nav-pills nav-stacked">
            <li><a href="homeCliente.php">Home</a></li>
            <li><a href="homeFornecedor.php?idFor=<?=$id?>">Home Fornecedor</a></li>
            <li><a href="criarFesta.php">Criar Festa</a></li>
            <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
            <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
            <li><a href="fornecedores.php">Fornecedores</a></li>            
          </ul>
        </div>
  <div class="col-md-8"><div class="panel panel-primary" style="background-image: url(img/slide1.jpg);background-size: 100% 100%;height: 256px;">
    <br />
     <img src="<?php if($imgPerfil == null){echo 'img/fotoUser.jpg';}else{echo 'getImagemPerfil.php?idFesta='.$idFesta.'';};?>" alt="..." class="img-thumbnail center-block" width="200" height="200"> 
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Titulo: </strong><?=$nomeFesta?></h3>
  </div>
  <div class="panel-body">
    <strong>Aniversáriante: </strong><?=$nomeAniver?> <br />
    <strong>Data: </strong><?=$dataFesta?> <br />
    <strong>Horário:</strong><?=$horaFesta?>h<br />
    <strong>Local:</strong>
    <?=$logradouro?>,
    <?=$logNum?>,
    <?=$bairro?>,
    <?=$cidade?>.
    <br /><br />
    <a href="editarFesta.php?idFesta=<?=$idFesta?>"><button type="button" class="btn btn-danger">Editar</button></a>
    <a href="excluirFesta.php?idFesta=<?=$idFesta?>"><button type="button" class="btn btn-danger" onclick="return confirm('Deseja realmente Excluir?');">Excluir festa</button></a>
  </div>
</div>
<h2>Fornecedores</h2>
<div class="panel panel-primary">
  <div class="panel-body">
<div class="row">

<?php

$con2 = $link->query("SELECT id_usuario FROM tb_festasServicos WHERE id_festa = '$idFesta' ");

  while ($reg2 = $con2->fetch_array()) {
    $idUsuario = $reg2['id_usuario'];
    
      $con3 = $link->query("SELECT * FROM tb_usuario WHERE id_usuario = $idUsuario ");
        while ($reg3 = $con3->fetch_array()){

            echo '

              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="getImagemLogo.php?idUsuario='.$reg3['id_usuario'].'" alt="...">
                    <div class="caption">
                      <h3>'.$reg3['nm_empresa'].'</h3>
                         <p><strong>Responsável:</strong> '.$reg3['nm_usuario'].'<br />
                            <strong>Telefone:</strong> '.$reg3['fn_usuario'].'<br /></p>
                  <p><a href="visualizarFornecedor.php?idFesta='.$idFesta.'&idFor='.$idUsuario.'" class="btn btn-primary" role="button">Visualizar</a>
                      <a href="removerForFesta.php?idFesta='.$idFesta.'&idFor='.$idUsuario.'" class="btn btn-default" role="button">Remover</a></p>
              </div>
            </div>
          </div>

            ';
      }
  }

$link->close();

?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="fornecedores.php?idFesta=<?=$idFesta?>"><img src="img/addFor3.jpg" alt="Add For"></a>
      </div>
    </div>


</div>
</div>
</div>
<button type="button" class="btn btn-primary" onclick="window.history.back();">Voltar</button><br /><br />
</div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>