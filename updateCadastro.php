<?php

session_start();

$logado = $_SESSION['nome'];
	if((!isset($_SESSION['nome']))){
		header('location: index.php');
};

require "conecta.php";

$nomeUsuario = $_POST['nome'];
$email = $_POST['email'];

if(!empty($_POST['senha'])){
$senha = md5($_POST['senha']);

$sql = "UPDATE tb_usuario SET
		pw_senha = '$senha'
		WHERE nm_usuario = '$logado'";

	$res = $link->query($sql);
};

$cidade = $_POST['cidade'];
$telefone = $_POST['tel'];

$sql2 = "UPDATE tb_usuario SET
		nm_usuario = '$nomeUsuario',
		te_email = '$email',
		nm_cidade = '$cidade',
		fn_usuario = '$telefone'
		WHERE nm_usuario = '$logado'";

	$res2 = $link->query($sql2);

	$_SESSION['nome'] = $nomeUsuario ;

echo '<script type="text/javascript">alert("Cadastro Alterado com Sucesso!");window.location=("homeCliente.php");</script>';

mysql_close($link);

?>