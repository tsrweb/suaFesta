<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	

include "conecta.php";
include "dataHora.php";

$msgPara = $_GET['msgPara'];
$assunto = $_POST['assunto'];
$msg = $_POST['msg'];
$usuario = $_POST['msgDe'];

	$con = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado'");

	while($reg = $con->fetch_array()){
		$idUsuario = $reg['id_usuario'];
	};

$con2 = $link->query("INSERT INTO tb_chat(te_assunto,id_usuario,dt_data) VALUES ('$assunto','$idUsuario','$data')");

$ultimo = $link->insert_id;

$con3 = $link->query("INSERT INTO tb_msg(id_chat,te_msgDe,te_msgPara,te_msg,dt_data,hr_hora) VALUES ('$ultimo','$usuario','$msgPara','$msg','$data','$hora')");

$con4 = $link->query("SELECT * FROM tb_usuario WHERE nm_empresa = '$msgPara' ");
	while ($reg = $con4->fetch_array()) {
		$emailPara = $reg['te_email'];
	};


$link->close();

$corpo = "

<img src='http://suafesta.tsrweb.com.br/img/logoHome.png' alt='...''>

<h1><b>Contato Sua Festa: </b></h1><hr>

O Usuario <b>".$usuario."</b> entrou em contato com você! <br /><br />

".$msg."<br /><br />

Para responder acesse o <a href='http://suafesta.tsrweb.com.br' targed='_blank'>SuaFesta</a>

<hr>
";

$para = $emailPara;
$assunto = "Contato Sua Festa";
$menssagem = $corpo;
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: Sua Festa<no-respond@tsrweb.com.br>" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);

$link->close();

header("location: chat.php?idChat=$ultimo");

?>