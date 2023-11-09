<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
    header('location: index.php');
  }

require "conecta.php";
require "chkMsg.php";

$idFor = $_GET['idFor'];

if(!empty($_GET['idFesta'])){
$idFesta = $_GET['idFesta'];
};

$con = $link->query("SELECT * FROM tb_usuario WHERE id_usuario = '$idFor'");

while($reg = $con->fetch_array()){

$usuario = $reg['nm_usuario'];
$nomeEmpresa = $reg["nm_empresa"];
$info = $reg["te_descricao"];
$cidade = $reg['nm_cidade'];
$bairro = $reg['nm_bairro'];
$logradouro = $reg['te_logradouro'];
$lograNumero = $reg['nu_numero'];
$tel = $reg['fn_usuario'];
$imgLogo = $reg['img_logo'];
$img_foto1 = $reg['img_foto1'];
$img_foto2 = $reg['img_foto2'];
$img_foto3 = $reg['img_foto3'];
$img_foto4 = $reg['img_foto4'];

  };

$con2 = $link->query("SELECT * FROM tb_servicosUsuarios WHERE id_usuario = '$idFor' ");

if ($imgLogo == null){$foto = "img/semImgFor.jpg";}else{$foto = "getImagemLogo.php?idUsuario=$idFor";};

if ($img_foto1 == null){$foto1 = "img/semImgFor.jpg";}else{$foto1 = "getImagemFotos.php?idUsuario=$idFor&idFoto=img_foto1";};
if ($img_foto2 == null){$foto2 = "img/semImgFor.jpg";}else{$foto2 = "getImagemFotos.php?idUsuario=$idFor&idFoto=img_foto2";};
if ($img_foto3 == null){$foto3 = "img/semImgFor.jpg";}else{$foto3 = "getImagemFotos.php?idUsuario=$idFor&idFoto=img_foto3";};
if ($img_foto4 == null){$foto4 = "img/semImgFor.jpg";}else{$foto4 = "getImagemFotos.php?idUsuario=$idFor&idFoto=img_foto4";};

?>
<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Fornecedor</title>

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
            <li class="active"><a href="fornecedores.php">Fornecedores<span class="sr-only">(current)</span></a></li>            
          </ul>
        </div>
  <div class="col-md-8">
    <div class="jumbotron" style="background-image: url(img/bannerFor.jpg);background-size: 100% 100%;">
<div class="media">
  <div class="media-left">
      <img class="media-object" src="<?=$foto?>" alt="..." width="100" height="100">
  </div>
  <div class="media-body">
    <h2 class="media-heading"><?=$nomeEmpresa?></h2><br />
    <p><?php
     while($reg2 = $con2->fetch_array()) {
      echo $reg2['nm_servico']." ";
    };?></p>
  </div>
</div>
</div>

  <div class="col-md-13">
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Descrição:</strong></h3>
  </div>
  <div class="panel-body">
  <?=$info?>
  </div>
</div>
  </div>

<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" data-toggle="modal" data-target=".bs-example-modal-lg">
      <img src="<?=$foto1?>" alt="..." width="477" height="478">
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" data-toggle="modal" data-target=".bs-example-modal-lg">
      <img src="<?=$foto2?>" alt="..." width="477" height="478">
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" data-toggle="modal" data-target=".bs-example-modal-lg">
      <img src="<?=$foto3?>" alt="..." width="477" height="478">
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" data-toggle="modal" data-target=".bs-example-modal-lg">
      <img src="<?=$foto4?>" alt="..." width="477" height="478">
    </a>
  </div>
</div>
<div class="row">
  <div class="col-md-1 col-md-offset-5">
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">Visualizar</button>
  </div>
  </div>
<div class="row">
  <div class="col-md-12">
  <h2>Sobre</h2>
    <div class="panel panel-primary">
  <div class="panel-body">
  <strong>Endereço: </strong><?=$logradouro.', '.$lograNumero.', '.$bairro.', '.$cidade ?><br />
  <strong>Responsável: </strong><?=$usuario?><br />
  <strong>Telefone: </strong><?=$tel?><br /><br />

  <?php 

  if($logado != $usuario){

    $con3 = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado'");

    while($reg = $con3->fetch_array()){

     $idUsuario = $reg['id_usuario'];

  };

    $con4 = $link->query("SELECT id_festa FROM tb_festa WHERE id_usuario = '$idUsuario' ");

    $check = $con4->num_rows;

    if ($idFesta == "sf" && $check == 0 ){
      echo '<a href=""><button type="button" class="btn btn-danger" onclick="erro();" >Adicionar</button></a> ';
    }else if ($idFesta == "sf" ){
      echo '<a href=""><button type="button" class="btn btn-danger" onclick="erro1();" >Adicionar</button></a> ';
    }else{
      echo '<a href="addForFesta.php?idFesta='.$idFesta.'&idFor='.$idFor.'"><button type="button" class="btn btn-danger">Adicionar</button></a> ';}
      echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg1">Enviar Mensagem</button> ';
    };
    if($logado == $usuario){
      echo'<a href="editarFornecedor.php"><button type="button" class="btn btn-danger">Editar</button></a> ';
    };
  ?>

    </div>
  </div>
 </div>
</div>
<button type="button" class="btn btn-primary" onclick="window.history.back();">Voltar</button><br /><br />
</div>
</div>
</div>

<!--Modal-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <!--Carousel-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?=$foto1?>" alt="..." width="600" height="600" class="center-block">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="<?=$foto2?>" alt="..." width="600" height="600" class="center-block">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="<?=$foto3?>" alt="..." width="600" height="600" class="center-block">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="<?=$foto4?>" alt="..." width="600" height="600" class="center-block">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!--Fim Carousel-->
    </div>
  </div>
</div>
<!--Fim Modal-->

<!--Modal2-->
<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
        <h3>Enviar Mensagem</h3>
            <form class="form-inline" method="post" action="iniciarChat.php?msgPara=<?php echo $nomeEmpresa?>">
              <div class="form-group">
                <label for="exampleInputName2">De:</label>
                <input type="text" class="form-control" id="msgDe" name="msgDe" value="<?=$logado?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail2">Assunto:</label>
                <input type="text" class="form-control" id="assunto" name="assunto" required>
              </div><br /><br />
              <strong>Menssagem: </strong><br />
              <textarea class="form-control" rows="10" cols="100" name="msg" required></textarea><br /><br />
              <p><button type="submit" class="btn btn-primary">Enviar</button></p><br /><br /><br />
            </form>
     </div>
    </div>
  </div>
 </div>
</div>
<!--Fim Modal2-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      function erro(){
        alert('Você precisa criar uma festa para poder adicionar fornecedores.');

      };
      function erro1(){
        alert('Você precisa selecionar a festa para poder adicionar o fornecedor.');
      };
    </script>
  </body>
</html>