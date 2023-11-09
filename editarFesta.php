<?php

session_start();

$logado = $_SESSION['nome'];
	if((!isset($_SESSION['nome']))){
		header('location: index.php');
};

$idFesta = $_GET['idFesta'];

require "conecta.php";
require "chkMsg.php";

$con = $link->query("SELECT * FROM tb_festa WHERE id_festa = '$idFesta' ");

while($reg = $con->fetch_array()){

$nomeFesta  = $reg['nm_festa'];
$nomeAniver = $reg['nm_aniversariante'];
$dataFesta  = $reg['dt_dataFesta'];
$horaFesta  = $reg['hr_horaFesta'];
$cidade     = $reg['nm_cidade'];
$bairro     = $reg['nm_bairro'];
$logradouro = $reg['te_logradouro'];
$logNum     = $reg['nu_numero'];
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
    <title>Crie sua festa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/inp.css" rel="stylesheet">

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
            <li class="active"><a href="criarFesta.php">Criar Festa<span class="sr-only">(current)</span></a></li>
            <li><a href="suaFesta.php">Sua Festa</a></li>
            <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
            <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
            <li><a href="fornecedores.php">Fornecedores</a></li>            
          </ul>
        </div>

  <div class="col-md-4 col-md-offset-2">

  <form method="post" action="updateFesta.php?idFesta=<?=$idFesta?>" enctype="multipart/form-data">

  	<div class="form-group">
    <label for="exampleInputFile">Imagem do perfil</label>
    <input type="file" id="perfilImg" name="perfilImg">
    <p class="help-block">Foto do aniversariante. ".jpg / .png"</p>
  	</div>
	
	<label for="nomeFesta">Nome da festa:</label><br />
	<input type="text" id="nomeFesta" name="nomeFesta" size="50" class="inputAll" required autocomplete="off" placeholder="Digite um título para sua festa." value="<?=$nomeFesta?>" /><br /><br />

	<label for="nomeAniver">Nome do Aniversáriante:</label><br />
	<input type="text" id="nomeAniver" name="nomeAniver" size="50" class="inputAll" required autocomplete="off" value="<?=$nomeAniver?>" /><br /><br />

	<label for="dtFesta">Data da Festa:</label><br />
	<input type="date" id="dtFesta" name="dtFesta" class="inputAll" required value="<?=$dataFesta?>" /><br /><br />

  <label for="hrFesta">Hora da Festa:</label><br />
  <input type="time" id="hrFesta" name="hrFesta" class="inputAll" value="<?=$horaFesta?>" /><br /><br />

	<label for="cidade">Cidade:</label><br />
		<select id="cidade" name="cidade" class="inputAll" >
			<option value="<?=$cidade?>"><?=$cidade?></option>
			<option value="Recife">Recife</option>
			<option value="Olinda">Olinda</option>
		</select><br /><br />

	<label for="bairro">Bairro:</label><br />
	<input type="text" id="bairro" name="bairro" class="inputAll" autocomplete="off" value="<?=$bairro?>" /><br /><br />

	<label for="logradouro">Logradouro:</label><br />
	<input type="text" id="logradouro" name="logradouro" size="50" class="inputAll" autocomplete="off" value="<?=$logradouro?>" /><br /><br />

	<label for="lograNumero">Número:</label><br />
	<input type="text" id="lograNumero" name="lograNumero" size="10" class="inputAll" autocomplete="off" value="<?=$logNum?>" /><br /><br />

	<input type="submit" value="Salvar" class="btn btn-primary" onclick="return confirm('Deseja realmente editar este cadastro?');" />
	<a href="suaFesta.php?idFesta=<?=$idFesta?>"><button type="button" class="btn btn-primary" onclick="return confirm('As Alterações não serão salvas!');">Voltar</button></a><br /><br />

</form>
</div>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>