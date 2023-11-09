<?php
session_start();
$logado = $_SESSION['nome'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

require "conecta.php";
require "chkMsg.php"; // Contém as query para coleta dos dados

?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mensagens</title>

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
                <li><a href="homeCliente.php">Home</a></li>
                <li><a href="homeFornecedor.php?idFor=<?=$id?>">Home Fornecedor</a></li>
                <li><a href="criarFesta.php">Criar Festa</a></li>
                <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
                <li class="active"><a href="conversas.php">Mensagens <span class="badge"><?=$quant?></span><span class="sr-only">(current)</span></a></li>
                <li><a href="fornecedores.php">Fornecedores</a></li>                
            </ul>
        </div>
        <div class="col-md-8">
            <h2 class="text-center">Mensagens</h2>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">

<?php while($reg = $conMsg->fetch_array()){

    $idChat = $reg['id_chat'];

    $colet = $link->query("SELECT * FROM tb_msg WHERE id_chat = '$idChat' ");

    while ($col = $colet->fetch_array()) {
    $msgDe = $col['te_msgDe'];
    $msgPara = $col['te_msgPara'];
};

    $con2 = $link->query("SELECT * FROM tb_chat WHERE id_chat = '$idChat'");

    while($reg2 = $con2->fetch_array()){
    $idUsuario = $reg2['id_usuario'];
    $assunto   = $reg2['te_assunto'];
    $data      = $reg2['dt_data'];

    echo '<div class="media">
            <div class="media-left media-middle">
                <a href="chat.php?idChat='.$idChat.'">
                    <img class="media-object" src="img/iconMsg.png" alt="...">
                        </a>
                </div>
                    <div class="media-body">
                            <h4 class="media-heading"><b>Assunto: </b>'.$assunto.'</h4>
                        <b>De:</b> '.$msgDe.' &nbsp&nbsp&nbsp <b>Para:</b> '.$msgPara.' &nbsp&nbsp&nbsp <b>Data:</b> '.$data.'
                        <br /><p><a href="chat.php?idChat='.$idChat.'"><button type="button" class="btn btn-info btn-xs">Abrir conversa</button></a></p>
                    </div>
                </div>';
    

};
};
if ($quant == 0 ) {echo '<h2 class="text-center">Você não tem mensagens.</h2>';};
?>
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