
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");

	$conn_classes = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado_classes=mysqli_query($conn_classes, "SELECT * FROM classes");
	$linhas_classes=mysqli_num_rows($resultado_classes);

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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Checkbox -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Termômetro de Classes</h1>
  </div>
 <form class="form-horizontal" method="POST" action="listar_termometro_classe.php" autocomplete="off">
<body role="document">
    <div class="container theme-showcase" role="main">      
		<div class="row">
			<div class="col-md-12">
				<table class="table">
							  
							<form class="form-horizontal">
						         <div class="form-group">
							          <label class="col-sm-2 control-label">Data do Apontamento</label>
								          <div class="col-sm-10">
								            <div class="input-group date">
								              <input type="text" class="form-control" name="dataapontamento" id="dataapontamento" >
								              <div class="input-group-addon">
								                <span class="glyphicon glyphicon-th"></span>
								              </div>
							            	</div>

					          			</div>
					          </div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Classe:</label>
									<div class="col-sm-10">
									<select name="classe" type="text" class="form-control" id="recipient-classe">
										<option value="">Selecione</option>
										<?php
											while($linhas_classes = mysqli_fetch_assoc($resultado_classes)){ ?>
												<option required="" value="<?php echo $linhas_classes['id_classes']; ?>"><?php echo $linhas_classes['id_classes']; ?><?php echo " - "; ?><?php echo $linhas_classes['classe']; ?><?php echo " - "; ?><?php echo $linhas_classes['professor']; ?></option> <?php
											}
										?>
									</select>
							  </div>
							  </div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary">Consultar</button>
			</div>
		  </div>
		</form>
					 
				</table>
			</div>
		</div>		
	</div>

   <!--Script de Data-->
	<script type="text/javascript">
	      $('#dataapontamento').datepicker({  
	        format: "dd/mm/yyyy",
	        startView: 3, 
	        language: "pt-BR",
	        daysOfWeekDisabled : "0,1,2,3,4,5" , 
	        maxViewMode : 0 , 
	    	//todayBtn : "ligado" , 
	        clearBtn: true,
	        //minViewMode: 3,
	       // startDate: '+0d',
	      });</script>
	    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>