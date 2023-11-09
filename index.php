<?php /* Desenvolvido por Tiago Rodrigues */
  session_start();  
?>
<?php if((isset($_SESSION['erro']))){echo $_SESSION['erro'];}?>

<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sua Festa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>  

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
        <img  src="img/logo.png">
      </a>
      <a class="navbar-brand" href="index.php">Sua Festa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post" action="login.php">
            <div class="form-group">
              <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    <div id="toTop"><img src="img/backtop.png"></div>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/slide1.jpg" alt="...">
      <div class="carousel-caption">
        <img src="img/logo.png">
        <h2>Bem Vindo à Sua Festa</h2>
        <p>Com apenas algumas informações básicas você já pode criar sua festa!</p>
        <p><a class="btn btn-lg btn-primary" href="cadastro.php" role="button">Cadastre-se</a></p>
      </div>
    </div>
    <div class="item">
      <img src="img/slide2.jpg" alt="...">
      <div class="carousel-caption">
        <h3>Aqui você pode!</h3>
        <p>Com Sua Festa, você também pode oferecer seus serviços como: Bolos,Doces,Salgados e etc.</p>
        <p><a class="btn btn-lg btn-primary" href="cadastro.php" role="button">Cadastre-se</a></p>
      </div>
    </div>
    <div class="item">
      <img src="img/slide3.jpg" alt="...">
      <div class="carousel-caption">
        <h3>Seja um Fornecedor</h3>
        <p>Com Sua Festa, você também pode oferecer seus serviços como: Bolos,Doces,Salgados e muito mais!</p>
        <p><a class="btn btn-lg btn-primary" href="cadastro.php" role="button">Cadastre-se</a></p>
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-sm-6 col-md-5">
          <img class="featurette-image img-responsive center-block" src="img/imgHome1.png" alt="Generic placeholder image">
            </div>
        <div class="col-sm-6 col-md-6">
          <h2 class="featurette-heading">Seja bem vindo!<br /><span class="text-muted">Organize sua festa.</span></h2>
          <p class="lead">Aqui você monta sua festa selecionando os melhores fornecedores da região, tudo simples, rápido e o que é melhor, GRATUITO!</p>
          <a href="cadastro.php"><button type="button" class="btn btn-primary btn-lg">Cadastre-se</button></a>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5 col-md-push-7">
          <img class="featurette-image img-responsive center-block" src="img/imgHome2.jpg" alt="Generic placeholder image">
            </div>
        <div class="col-md-6 col-md-pull-4">
          <h2 class="featurette-heading">Tudo que você precisa está aqui! <br /><span class="text-muted">Com diversas opções.</span></h2>
          <p class="lead">Aqui você encontra fornecedores de bolos, doces, salgados, lembrancinhas e não é só isso. Serviços como fotografia, filmagem, alugueis de espaço, mesas e MUITO MAIS!!!</p>
          <a href="cadastro.php"><button type="button" class="btn btn-primary btn-lg">Venha conhecer!</button></a>
        </div>

      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-sm-6 col-md-6">
          <img class="featurette-image img-responsive center-block" src="img/imgHome3.jpg" alt="Generic placeholder image">
            </div>
        <div class="col-sm-6 col-md-5">
          <h2 class="featurette-heading">Cadastro simples, rápido e <span class="text-muted">GRATUITO!</span></h2>
          <p class="lead">Com Sua Festa, você cria um "perfil" com o título da festa, nome do aniversáriante e a data do evento, após essas informões, você navega em uma lista de fornecedores podendo entrar em contato e selecionando os melhores para tornar sua festa inerquecível!!!</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 Ideal Software</p>
      </footer>

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