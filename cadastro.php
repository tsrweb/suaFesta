<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/cssReset.css" />
	<link rel="stylesheet" type="text/css" href="css/estiloGeral.css" />
	<link rel="stylesheet" type="text/css" href="css/estiloCadCli.css" />
	<link rel="icon" href="img/favicon.ico">
</head>

<body>

	<div id="tudo">

	<div class="topo">
		<img src="img/logo.png">
		<h3>SuaFesta</h3>
		</div>

		<div id="conteudoCadCli">

			<div class="blocoB">

				<h1>Cadastro</h1>

			<form method="POST" action="envioCadastro.php">

				<label for="nome">Nome:</label><br />
				<input type="text" id="nome" name="nome" size="50" class="inputAll" required autocomplete="off" /><br /><br />

				<label for="email">Email:</label><br />
				<input type="email" id="email" name="email" size="50" class="inputAll" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" /><br /><br />

				<label for="senha">Senha:</label><br />
				<input type="password" id="senha" name="senha" size="50" class="inputAll" required /><br /><br />

				<label for="confirSenha">Confirme a Senha:</label><br />
				<input type="password" id="confirSenha" name="confirSenha" size="50" class="inputAll" required /><br /><br />

				<div class="campoLateral">
					<label for="cidade">Cidade:</label><br />
						<select id="cidade" name="cidade" class="inputAll" required  >
							<option value="">Selecione sua cidade</option>
							<option value="Recife">Recife</option>
							<option value="Olinda">Olinda</option>
						</select>
				</div>

				<label for="tel">Telefone:</label><br />
				<input type="text" id="tel" name="tel" size="22" class="inputAll" autocomplete="off" /><br /><br />

				<input type="submit" value="Cadastrar" class="buttonAll" />
				<input type="reset" value="Limpar" class="buttonAll" />
				<a href="index.php"><button type="button" class="buttonAll">Voltar</button></a>
			</form>
			</div>

				<div class="blocoA">
					<img src="img/logo.png">
						<div id="blocoAinfo">
						<p>Cadastre-se e organize sua festa da forma que quizer, é simples, rápido e o que é melhor, GRATUITO!</p>
						</div>
				</div>

		</div>

</div>

<script type="text/javascript" src="js/JavaScript.js"></script>
<script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>
<script type="text/javascript">tel();</script>
</body>
</html>