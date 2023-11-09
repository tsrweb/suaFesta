<?php

$msgDe = $_POST['msgDe'];
$msgPara = $_POST['msgPara'];
$msg = $_POST['msg'];
$idFesta = $_GET['idFesta'];
$idFor = $_GET['idFor'];

include "conecta.php";

$con = mysql_query("SELECT * FROM tb_usuario WHERE nm_empresa = '$msgPara' ");
	while ($reg = mysql_fetch_array($con)) {
		$emailPara = $reg['te_email'];
	};

$con2 = mysql_query("SELECT * FROM tb_usuario WHERE nm_usuario = '$msgDe' ");
	while ($reg2 = mysql_fetch_array($con2)) {
		$emailDe = $reg2['te_email'];
	}

$corpo = "

<h1><b>Contato Sua Festa: </b></h1><hr>

O Usuario <b>".$msgDe."</b> entrou em contato com você! <br /><br />

".$msg."<br /><br />

Para responder utilize o seguinte email: ".$emailDe."

<hr>
";

$para = $emailPara;
$assunto = "Contato Sua Festa";
$menssagem = $corpo;
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: Sua Festa<no-respond@tsrweb.com.br>" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);

echo '<script type="text/javascript">alert("Mensagem enviada!");window.location=("visualizarFornecedor.php?idFesta='.$idFesta.'&idFor='.$idFor.'");</script>';

mysql_close($link);
?>