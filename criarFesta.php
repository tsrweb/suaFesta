<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

  require "conecta.php";
  require "chkMsg.php";

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
            <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
            <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
            <li><a href="fornecedores.php">Fornecedores</a></li>            
          </ul>
        </div>

  <div class="col-md-4 col-md-offset-2">

  <form method="post" action="envioFesta.php" enctype="multipart/form-data">
	
	<label for="nomeFesta">Nome da festa:</label><br />
	<input type="text" id="nomeFesta" name="nomeFesta" size="50" class="inputAll" required autocomplete="off" placeholder="Digite um título para sua festa." /><br /><br />

	<label for="nomeAniver">Nome do Aniversáriante:</label><br />
	<input type="text" id="nomeAniver" name="nomeAniver" size="50" class="inputAll" required autocomplete="off" /><br /><br />

  <div class="form-group">
  <label for="perfilImg">Imagem do perfil</label>
  <input type="file" id="perfilImg" name="perfilImg">
  <p class="help-block">Foto do aniversariante. ".jpg"</p>
  </div>

	<label for="dtFesta">Data da Festa:</label><br />
	<input type="date" id="dtFesta" name="dtFesta" class="inputAll" required /><br /><br />

  <label for="hrFesta">Hora da Festa:</label><br />
  <input type="time" id="hrFesta" name="hrFesta" class="inputAll" /><br /><br />

	<label for="cidade">Cidade:</label><br />
		<select id="cidade" name="cidade" class="inputAll" >
			<option value="">Selecione sua cidade</option>
			<option value="Recife">Recife</option>
			<option value="Olinda">Olinda</option>
		</select><br /><br />

	<label for="bairro">Bairro:</label><br />
	<input type="text" id="bairro" name="bairro" class="inputAll" autocomplete="off" /><br /><br />

	<label for="logradouro">Logradouro:</label><br />
	<input type="text" id="logradouro" name="logradouro" size="50" class="inputAll" autocomplete="off" /><br /><br />

	<label for="lograNumero">Número:</label><br />
	<input type="text" id="lograNumero" name="lograNumero" size="10" class="inputAll" autocomplete="off" /><br /><br />

	<input type="submit" value="Criar" class="btn btn-primary" />
	<input type="reset" value="Limpar" class="btn btn-primary" />
	<a href="homeCliente.php"><button type="button" class="btn btn-primary" onclick="return confirm('As Alterações não serão salvas!');" >Voltar</button></a>
  <br /><br />


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