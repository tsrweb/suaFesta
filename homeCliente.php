<?php
session_start();
$logado = $_SESSION['nome'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

require "conecta.php";
require "chkMsg.php";

$con = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado'");

while ($reg = $con->fetch_array()) {

    $idUsuario = $reg['id_usuario'];

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
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php include "navBar.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="homeCliente.php">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="homeFornecedor.php?idFor=<?=$id?>">Home Fornecedor</a></li>
                <li><a href="criarFesta.php">Criar Festa</a></li>
                <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
                <li><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span></a></li>
                <li><a href="fornecedores.php">Fornecedores</a></li>                
            </ul>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="background-image: url(img/slide1.jpg);background-size: 100% 100%;">
                <div class="col-md-4 col-md-offset-4">
                    <img src="img/logoHome.png" alt="..." class="img-thumbnail" style="background: none; border:none;">
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/>
            </div>
            <h2>Sua Festa</h2>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">

                        <?php

                        $con2 = $link->query("SELECT * FROM tb_festa WHERE id_usuario = '$idUsuario' ");

                        while ($reg = $con2->fetch_array()) {
                            $idFesta = $reg['id_festa'];
                            $imgPerfil = $reg['img_perfil'];

                            if ($imgPerfil == null){$foto = "img/fotoUser.jpg";}else{$foto = "getImagemPerfil.php?idFesta=$idFesta";};
                            echo '

              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <a href="suaFesta.php?idFesta=' . $idFesta . '""><img src="'.$foto.'" alt="..." width="150" height="150"></a>
                    <div class="caption">
                      <h3>' . $reg['nm_festa'] . '</h3>
                         <p><strong>Aniversáriante:</strong> ' . $reg['nm_aniversariante'] . '<br />
                            <strong>Data:</strong> ' . $reg['dt_dataFesta'] . '<br />
                            <strong>Horário:</strong> ' . $reg['hr_horaFesta'] .'h<br /></p>
                  <p><a href="suaFesta.php?idFesta=' . $idFesta . '" class="btn btn-primary" role="button">Visualizar</a>
                      <a href="excluirFesta.php?idFesta=' . $idFesta . '" class="btn btn-default" role="button">Remover</a></p>
              </div>
            </div>
          </div>

            ';
                        };


                        $link->close();

                        ?>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="criarFesta.php"><img src="img/addFesta.jpg" alt="Add For"></a>
                            </div>
                        </div>


                    </div>
                </div>
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