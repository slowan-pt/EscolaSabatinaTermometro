<?php
$dia = date("j");
$mes = date("n");
$ano = date("Y");
//$hoje = date(" j, F, Y, g:i a");                 // March 10, 2001, 5:16 pm
//echo "$hoje";

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Sloan">
    <link rel="icon" href="imagens/es.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Professor</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- DATA -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/bootstrap-datepicker.min.js"></script> 
    <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
 
<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="administrativo.php">Escola Sabatina</a>

</div>
	<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-secondary"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adicionar <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="cad_apontamento.php">Apontamento</button></a>
							</ul>
						</li>
					</ul>
						<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-secondary"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="listar_aluno.php">Alunos</button></a>
												<li><a href="listar_visitante.php">Visitantes</button></a>
												<li><a href="listar_apontamento.php">Apontamentos</button></a>
							</ul>
						</li>
					</ul>
					<!--Relatório  -->
					</ul>
						<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-light"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatório <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="termometro_menu.php">Termômetro</button></a>
												
							</ul>
						</li>
					</ul>
					<!--Relatório Fim -->

					<a class="navbar-brand" href="sair.php">Sair</a>

				</div><!--/.nav-collapse -->
					<?php echo "$dia/$mes/$ano - Bem Vindo Professor";?>
			</div>
			
		</nav>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
      $('#databatismo').datepicker({  
        format: "dd/mm/yyyy",
        startView: 3, 
        language: "pt-BR",
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>
      <script type="text/javascript">
      $('#datanascimento').datepicker({  
        format: "dd/mm/yyyy", 
        startView: 3,
        language: "pt-BR",
        clearBtn: true,
        //startDate: '+0d',
      });</script>
	</body>
</html>
