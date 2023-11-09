<?php

session_start();

$logado = $_SESSION['nome'];
	if((!isset($_SESSION['nome']))){
		header('location: index.php');
};

require "conecta.php";

$idFesta = $_GET['idFesta'];

$nomeFesta = $_POST['nomeFesta'];
$nomeAniver = $_POST['nomeAniver'];
$dtFesta = $_POST['dtFesta'];
$hrFesta = $_POST['hrFesta'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$logradouro = $_POST['logradouro'];
$lograNumero = $_POST['lograNumero'];
$perfilImg = $_FILES['perfilImg'];

if($perfilImg != NULL) {
  $nomeFinal = 'perfilImg.jpg';
  if (move_uploaded_file($perfilImg['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal); 

    $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
    $link->query("UPDATE tb_festa SET img_perfil = '$mysqlImg' WHERE id_festa = '$idFesta' ");

  };
};

$sql = "UPDATE tb_festa SET
		nm_festa = '$nomeFesta',
		nm_aniversariante = '$nomeAniver',
		dt_dataFesta = '$dtFesta',
    hr_horaFesta = '$hrFesta',
		nm_cidade = '$cidade',
		nm_bairro = '$bairro',
		te_logradouro = '$logradouro',
		nu_numero = '$lograNumero'
		WHERE id_festa = '$idFesta'";

	$res = $link->query($sql);

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
    window.location=("suaFesta.php?idFesta=<?=$idFesta?>");
    }

    </script>
  </body>
</html><!-- /Load page -->