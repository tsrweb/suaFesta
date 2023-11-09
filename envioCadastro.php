<?php 

session_start();

$nomeUsuario = $_POST["nome"];
$email = addslashes($_POST["email"]);
$senha = md5($_POST["senha"]);
$cidade = $_POST["cidade"];
$tel = $_POST["tel"];
$tpUser = "simples";


require "conecta.php";

$verify = $link->query("SELECT * FROM tb_usuario WHERE te_email = '$email' ");

if ($verify->num_rows > 0) {

	echo "<script>	alert('email já cadastrado!');
					window.location.href = 'cadastro.php';
		</script>";

	die;
	}

$sql = $link->query("INSERT INTO tb_usuario (nm_usuario,te_email,pw_senha,nm_cidade,fn_usuario,tp_user)
VALUES('$nomeUsuario','$email','$senha','$cidade','$tel','$tpUser')");

$link->close();

echo '<script type="text/javascript">alert("Cadastro Realizado com Sucesso!");</script>';

	$_SESSION['nome'] = $nomeUsuario ;

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
