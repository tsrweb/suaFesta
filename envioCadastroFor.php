<?php

session_start();
$logado = $_SESSION['nome'];

$nomeEmpresa = $_POST["nomeEmpresa"];
$info = $_POST["infoServico"];
$bairro = $_POST['bairro'];
$logradouro = $_POST['logradouro'];
$lograNumero = $_POST['lograNumero'];
$imgLogo = $_FILES['imgLogo'];
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$foto4 = $_FILES['foto4'];
$tpUser = "fornecedor";

require "conecta.php";


$con = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado'");

while($reg = $con->fetch_array()){

	$idUsuario = $reg['id_usuario'];

	};

$mysqlImg  = '';
$mysqlImg1 = '';
$mysqlImg2 = '';
$mysqlImg3 = '';
$mysqlImg4 = '';

	if($imgLogo != NULL) { 
	$nomeFinal = 'imgLogo.jpg';
	if (move_uploaded_file($imgLogo['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));	
	}
};

  if($foto1 != NULL) { 
  $nomeFinal = 'foto1.jpg';
  if (move_uploaded_file($foto1['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal); 

    $mysqlImg1 = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
  }
};

  if($foto2 != NULL) { 
  $nomeFinal = 'foto2.jpg';
  if (move_uploaded_file($foto2['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal); 

    $mysqlImg2 = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
  }
};

  if($foto3 != NULL) { 
  $nomeFinal = 'foto3.jpg';
  if (move_uploaded_file($foto3['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal); 

    $mysqlImg3 = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
  }
};

  if($foto4 != NULL) { 
  $nomeFinal = 'foto4.jpg';
  if (move_uploaded_file($foto4['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal); 

    $mysqlImg4 = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
  }
};

$sql = $link->query("UPDATE tb_usuario SET
		nm_empresa = '$nomeEmpresa',
		te_descricao = '$info',
		nm_bairro = '$bairro',
		te_logradouro = '$logradouro',
		nu_numero = '$lograNumero',
		img_logo = '$mysqlImg',
		tp_user = '$tpUser',
    img_foto1 = '$mysqlImg1',
    img_foto2 = '$mysqlImg2',
    img_foto3 = '$mysqlImg3',
    img_foto4 = '$mysqlImg4'
		WHERE id_usuario = '$idUsuario'");


if ($_POST && isset($_POST['ativo'])){
 
  foreach($_POST['ativo'] as $valor){
    $sql2 = $link->query("INSERT INTO tb_servicosUsuarios (nm_servico,id_usuario) VALUES ('$valor','$idUsuario')");
  }
};

$link->close();

 ?>

 <!-- Load page -->
<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Criando Festa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

     <div class="progress" style="margin-top: 25%;">
  		<div class="progress-bar progress-bar-striped active" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" style="display: block;">
		 		0%
					</div>
						</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

      var elem = document.getElementById("progress-bar"); 
      var width = 1;
      var id = setInterval(frame, 10);
      function frame() {
          if (width >= 100) {
              clearInterval(id);
          } else {
              width++; 
              elem.style.width = width + '%'; 
              document.getElementById("progress-bar").innerHTML = width * 1  + '%';
              load();
        }
    }

    var myVar;

    function load() {
    myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
    window.location=("homeFornecedor.php?idFor=<?=$idUsuario?>");
    }

    </script>
  </body>
</html><!-- /Load page -->