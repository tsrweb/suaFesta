<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
    header('location: index.php');
  }

require "conecta.php";
require "chkMsg.php";

$con = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' ");

$con2 = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' AND tp_user = 'Fornecedor' ");

if ($con2->num_rows == 0) {

	echo '<script type="text/javascript">alert("Você não é fornecedor.");window.location=("cadastroFornecedor.php");</script>';
	die;
	};

while($reg = $con->fetch_array()){

$nomeEmpresa = $reg['nm_empresa'];
$info = $reg['te_descricao'];
$bairro = $reg['nm_bairro'];
$logradouro = $reg['te_logradouro'];
$lograNumero = $reg['nu_numero'];

  };

$link->close();

?>

<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alterar Cadastro</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/inp.css" />

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
            <li><a href="criarFesta.php">Criar Festa</a></li>
            <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
            <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
            <li><a href="fornecedores.php">Fornecedores</a></li>            
          </ul>
        </div>
  <div class="col-md-8 col-md-offset-1">
  	<div id="conteudoCadFor">

				<h1>Seja um Fornecedor</h1>

				<div id="bloco">

				<img src="img/logo.png">
						<div id="blocoInfo">
						<p>Tem algum talento? Aqui na <b>Sua Festa</b> você pode lucrar também!</p>
						</div>


				</div>

			<form method="POST" action="updateCadastroFor.php" enctype="multipart/form-data">

				<label for="nome">Nome da Empresa:</label><br />
				<input type="text" id="nome" name="nomeEmpresa" size="50" class="inputAll" required autocomplete="off" placeholder="Nome da empresa ou seu nome." value="<?=$nomeEmpresa?>" /><br /><br />

				<div class="form-group">
			    <label for="exampleInputFile">Alterar logo da Empresa:</label>
			    <input type="file" id="imgLogo" name="imgLogo">
			    <p class="help-block">Selecione a logo da sua empresa ou uma imagem que preferir.<br />".jpg / .png"</p>
			  	</div>

				<label for="descricao">Descrição dos seus serviços:</label><br />
				<textarea id="infoServico" name="infoServico" class="inputAll" rows="8" cols="50" placeholder="Descreva o que você faz."><?=$info?></textarea><br />

				<div class="form-group">
			    <label for="exampleInputFile">Fotos exemplos:</label>
			    <p><input type="file" id="foto1" name="foto1"></p>
			    <p><input type="file" id="foto2" name="foto2"></p>
			    <p><input type="file" id="foto3" name="foto3"></p>
			    <p><input type="file" id="foto4" name="foto4"></p>
			    <p class="help-block">Selecione fotos do seu trabalho para exibir na sua página.<br />".jpg / .png"</p>
			  	</div>

				<label for="bairro">Bairro:</label><br />
				<input type="text" id="bairro" name="bairro" class="inputAll" autocomplete="off" value="<?=$bairro?>" /><br /><br />

				<label for="logradouro">Logradouro:</label><br />
				<input type="text" id="logradouro" name="logradouro" size="50" class="inputAll" autocomplete="off" value="<?=$logradouro?>" /><br /><br />

				<label for="lograNumero">Número:</label><br />
				<input type="text" id="lograNumero" name="lograNumero" size="10" class="inputAll" autocomplete="off" value="<?=$lograNumero?>" /><br /><br />

				<fieldset>
				<legend>Escolha seus serviços</legend>
				<table>
				<tr><td><input type="checkbox" name="ativo[]" value="Bolos">Bolos</td>
				<td><input type="checkbox" name="ativo[]" value="Doces e Salgados">Doces e Salgados</td>
				<td><input type="checkbox" name="ativo[]" value="Decoração">Decoração</td></tr>
				<tr><td><input type="checkbox" name="ativo[]" value="Provençais">Provençais</td>
				<td><input type="checkbox" name="ativo[]" value="Fotografia">Fotografia</td>
				<td><input type="checkbox" name="ativo[]" value="Alugueis em Geral">Alugueis em Geral</td>
				</table>
				</fieldset>
				<br /><br />

				<div class="alert alert-danger" role="alert"><b>Atenção: </b>Caso não selecione os serviços, será mantido os já cadastrados.</div>

				<input type="submit" value="Salvar" class="btn btn-primary" onclick="return confirm('Deseja realmente editar este cadastro?');" />
				<a href="homeCliente.php"><button type="button" class="btn btn-primary" onclick="return confirm('As Alterações não serão salvas!');">Voltar</button></a>
			</form><br /><br />
		</div>
  </div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>