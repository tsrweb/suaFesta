<?php
session_start();
$logado = $_SESSION['nome'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

require "conecta.php";
require "chkMsg.php";

$idChat = $_GET['idChat'];

$verify = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' ");

    while($ver = $verify->fetch_array()){
        $nmEmpresa = $ver['nm_empresa'];
    };

$con = $link->query("SELECT * FROM tb_msg WHERE id_chat = '$idChat' ");

?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chat SuaFesta</title>

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

<div id="toTop"><img src="img/backtop.png"></div>

<?php include "navBar.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="homeCliente.php">Home</a></li>
                <li><a href="homeFornecedor.php?idFor=<?=$id?>">Home Fornecedor</a></li>
                <li><a href="criarFesta.php">Criar Festa</a></li>
                <li><a href="cadastroFornecedor.php">Seja um Fornecedor</a></li>
                <li class="active"><a href="conversas.php">Mensagens<span class="badge"><?=$quant?></span><span class="sr-only">(current)</span></a></li>
                <li><a href="fornecedores.php">Fornecedores</a></li>                
            </ul>
        </div>
        <div class="col-sm-12 col-md-8">
            <h2>Conversas</h2>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">

<?php while($reg = $con->fetch_array()){

    $idMsg = $reg['id_msg'];
    $msg = $reg['te_msg'];
    $msgDe = $reg['te_msgDe'];
    $msgPara = $reg['te_msgPara'];
    $data = $reg['dt_data'];
    $hora = $reg['hr_hora'];

    if($msgDe == "$logado" || $msgDe == "$nmEmpresa"){

        echo '<div class="media">
                <div class="media-left media-middle">
                    <img class="media-object" src="img/iconMsgDe.png" alt="...">
                </div>
                    <div class="media-body">
                        <b>Para:</b> '.$msgPara.' &nbsp&nbsp&nbsp <b>Data:</b> '.$data.'&nbsp&nbsp&nbsp'.$hora.'h<br />'.$msg.'
                    </div>
                </div>';
    }

    else if($msgDe != "$logado"){

        echo '<div class="media">
                <div class="media-body text-right">
                    <b>De:</b> '.$msgDe.'&nbsp&nbsp&nbsp <b>Data:</b> '.$data.'&nbsp&nbsp&nbsp'.$hora.'h<br />'.$msg.' 
                        </div>
                            <div class="media-right media-middle">
                                <img class="media-object" src="img/iconMsgPara.png" alt="...">
                                     </div>
                </div>';
};
};
?>
    <hr style="border-color: red;">

    <div class="col-md-10 col-md-offset-1">
        <form class="form-inline" method="post" action="enviarMsg.php?idChat=<?php echo $idChat;?>&msgPara=<?php if($msgPara == $logado || $msgPara == $nmEmpresa){echo $msgDe;}else echo $msgPara;?>" />
                <div class="media">
                    <div class="media-body text-left">
                        <label for="msg">Responder:</label><br />
                            <textarea class="form-control" cols="80" rows="5" id="te_msg" name="te_msg" placeholder="Texto..." required></textarea>
                                </div>
                            <div class="media-right media-bottom">
                                <input type="submit" class="btn btn-primary" value="Enviar"/>
                                    </div>
                </div>
        </form>
    </div>

                        </div>
                    </div>
                </div>
            <a href="conversas.php"><button type="button" class="btn btn-primary">Voltar</button></a><br /><br />
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function() {
    $(window).scroll(function() {
      if($(this).scrollTop() != 0) {$('#toTop').fadeIn();
      } else {$('#toTop').fadeOut();}});
        $('#toTop').click(function() {
          $('body,html').animate({scrollTop:0},800);
          });
        });
  </script>
</body>
</html>