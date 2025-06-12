<?php
  session_start();
 // include_once("menu_admin.php");
include_once("conexao.php");
$ano = date("Y");
  //Selecionar a maior pontuação
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado=mysqli_query($conn, "SELECT * FROM classes order by pontuacao DESC");
  $linhas=mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Sloan ALT">
    <link rel="icon" href="imagens/es.ico">

    <title>Administrativo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  </head>

	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
    <h1>Pontuação <a href="cad_pontuacao.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
  <?php
    include_once("menu_admin.php"); 

  ?>
    <div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">
    <table class="table">
    <thead>
     <tr>
                <th>#</th>
                <th>Classe</th>
                <th>Ano</th>
                <th>Trimestre</th>
                <th>Pontuação</th>
    </tr>
    </thead>
    <tbody>
      <?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                <tr>
                  <td><?php echo $linhas['id_classes']; ?></td>
                  <td><?php echo $linhas['classe']; ?></td>
                  <td><?php echo $linhas['ano']; ?></td>
                  <td><?php echo $linhas['trimestre']; ?></td>
                  <td><?php echo $linhas['pontuacao']; ?></td>

                  
              <td>
                  </td>
                </tr>

                <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
</div>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
