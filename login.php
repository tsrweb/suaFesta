<?php	/* Desenvolvido por Tiago Rodrigues */
session_start();

$email = addslashes($_POST['email']);
$senha = md5($_POST['senha']);

require "conecta.php";

$con = $link->query("SELECT * FROM tb_usuario WHERE te_email = '$email' AND pw_senha = '$senha'");

if ($con->num_rows > 0) {

	while($reg = $con->fetch_array()){

	$usuario = $reg['nm_usuario'];

	}

	$_SESSION['nome'] = $usuario ;
	header('location: homeCliente.php');
	} 
	else{
	unset($_SESSION['nome']);
	$_SESSION['erro'] = '<script type="text/javascript">alert("E-mail ou senha inválidos")</script>';
	header('location: index.php');
	}

$link->close();
?>