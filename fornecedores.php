<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

if(!empty($_GET['idFesta'])){
$idFesta = $_GET['idFesta'];
}else{$idFesta = "sf";};

  require "conecta.php";
  require "chkMsg.php";

if(!empty($_GET['cat'])){
$cat = $_GET['cat'];

  $con = $link->query("SELECT T1.*, T2.* FROM tb_servicosUsuarios T1 INNER JOIN tb_usuario T2 on (T1.id_usuario = T2.id_usuario ) where T1.nm_servico='$cat'
   ;");

}else{

$con = $link->query("SELECT * FROM tb_usuario WHERE tp_user = 'fornecedor'");

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
    <title>Fornecedores</title>

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
          </ul><br />

      <div class="list-group" data-toggle="collapse" data-target="#categoria" aria-expanded="false" aria-controls="categoria">
        <a href="#" class="list-group-item active">Categorias  &raquo;</a>
          <div class="collapse" id="categoria">
          <a href="fornecedores.php?cat=Bolos" class="list-group-item">Bolos</a>
          <a href="fornecedores.php?cat=Doces e Salgados" class="list-group-item">Doces e Salgados</a>
          <a href="fornecedores.php?cat=Decoração" class="list-group-item">Decoração</a>
          <a href="fornecedores.php?cat=Provençais" class="list-group-item">Provençais</a>
          <a href="fornecedores.php?cat=Fotografia" class="list-group-item">Fotografia / Filmagem</a>
          <a href="fornecedores.php?cat=Alugueis em Geral" class="list-group-item">Alugueis em Geral</a>
            </div>
        </div>



        </div>
  <div class="col-md-6">
  <?php

  while($reg1 = $con->fetch_array()){

    $idFornecedor = $reg1['id_usuario'];
    $imgLogo = $reg1['img_logo'];

      if ($imgLogo == null){$foto = "img/fotoUser.jpg";}else{$foto = "getImagemLogo.php?idUsuario=$idFornecedor";};

    $con2 = $link->query("SELECT * FROM tb_servicosUsuarios WHERE id_usuario = '$idFornecedor' ");

    echo '<div class="panel panel-primary">
  <div class="panel-body"><div class="media">
  <div class="media-left media-top">
    <a href="visualizarFornecedor.php?idFesta='.$idFesta.'&idFor='.$idFornecedor.'">
      <img class="media-object" src="'.$foto.'" alt="..." width="150" height="150">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">'.$reg1['nm_empresa']."</h4>
    Serviços:<br />";

    while($reg2 = $con2->fetch_array()) {
      echo $reg2['nm_servico']." ";
    };
    echo "<br /><br />".$reg1['nm_cidade'].", ".$reg1['nm_bairro']."<br />";

    echo '<a href="visualizarFornecedor.php?idFesta='.$idFesta.'&idFor='.$idFornecedor.'"><button type="button" class="btn btn-primary">Visualizar</button></a></h4>
  </div>
</div></div></div>';
  };

?></div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>