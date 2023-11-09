<?php

session_start();

$logado = $_SESSION['nome'];
	if((!isset($_SESSION['nome']))){
		header('location: index.php');
};

$idFesta = $_GET['idFesta'];

require "conecta.php";

$con = $link->query("DELETE FROM tb_festasServicos WHERE id_festa = '$idFesta' ");

$con2 = $link->query("DELETE FROM tb_festa WHERE id_festa = '$idFesta' ");

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
    window.location=("homeCliente.php");
    }

    </script>
  </body>
</html><!-- /Load page -->