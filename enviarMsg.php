<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	

require "conecta.php";
require "dataHora.php";

$verify = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' ");

    while($ver = $verify->fetch_array()){
        $nmEmpresa = $ver['nm_empresa'];
    };

if ($nmEmpresa == null) {
	
	$msgDe = $logado;
}else {
	$msgDe = $nmEmpresa;
}

$idChat = $_GET['idChat'];
$msgPara = $_GET['msgPara'];
$msg = $_POST['te_msg'];

$con = $link->query("INSERT INTO tb_msg(id_chat,te_msg,te_msgDe,te_msgPara,dt_data,hr_hora) VALUES ('$idChat','$msg','$msgDe','$msgPara','$data','$hora')");

$con2 = $link->query("SELECT * FROM tb_usuario WHERE nm_empresa = '$msgPara' ");
	while ($reg = $con2->fetch_array()) {
		$emailPara = $reg['te_email'];
	};


$link->close();

$corpo = "

<img src='http://suafesta.tsrweb.com.br/img/logoHome.png' alt='...''>

<h1><b>Contato Sua Festa: </b></h1><hr>

O Usuario <b>".$msgDe."</b> entrou em contato com você! <br /><br />

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

header("location: chat.php?idChat=$idChat");

?>