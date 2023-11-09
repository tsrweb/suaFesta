<?php
session_start();
$logado = $_SESSION['nome'];
if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

require "conecta.php";
require "chkMsg.php";

$con = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' ");

while($reg = $con->fetch_array()){

$nomeUsuario = $reg['nm_usuario'];
$email = $reg['te_email'];
$senha = $reg['pw_senha'];
$cidade = $reg['nm_cidade'];
$telefone = $reg['fn_usuario'];

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
    <title>Editar Cadastro</title>

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
            <li><a href="criarFesta.php">Criar Festa</a></li>
            <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
            <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
            <li><a href="fornecedores.php">Fornecedores</a></li>            
          </ul>
        </div>
  <div class="col-md-4">
    <form method="POST" action="updateCadastro.php">

        <label for="nome">Nome:</label><br />
        <input type="text" id="nome" name="nome" size="50" class="inputAll" required autocomplete="off" value="<?=$nomeUsuario?>" /><br /><br />

        <label for="email">Email:</label><br />
        <input type="email" id="email" name="email" size="50" class="inputAll" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" value="<?=$email?>" /><br /><br />

        <label for="senha">Senha:</label><br />
        <input type="password" id="senha" name="senha" size="50" class="inputAll" /><br /><br />

        <label for="confirSenha">Confirme a Senha:</label><br />
        <input type="password" id="confirSenha" name="confirSenha" size="50" class="inputAll" /><br /><br />

        <div class="campoLateral">
          <label for="cidade">Cidade:</label><br />
            <select id="cidade" name="cidade" class="inputAll" required  >
              <option value="<?=$cidade?>"><?=$cidade?></option>
              <option value="Recife">Recife</option>
              <option value="Olinda">Olinda</option>
            </select>
        </div><br />

        <label for="tel">Telefone:</label><br />
        <input type="text" id="tel" name="tel" size="22" class="inputAll" autocomplete="off" value="<?=$telefone?>" /><br /><br />

        <input type="submit" value="Salvar" class="btn btn-primary" onclick="return confirm('Deseja realmente editar este cadastro?');" />
        <a href="homeCliente.php"><button type="button" class="btn btn-primary" onclick="return confirm('As Alterações não serão salvas!');">Voltar</button></a>
      </form>
  </div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/JavaScript.js"></script>
    <script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>
    <script type="text/javascript">tel();</script>
  </body>
</html>