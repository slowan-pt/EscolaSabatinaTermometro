
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");

?>	

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Termômetro</h1>
  </div>
 <form class="form-horizontal" method="POST" action="pesq_termometro_geral.php" autocomplete="off">
<body role="document">

<a href="pesq_termometro_geral.php"><button type="button" class="btn btn-success btn-lg btn-block">Geral</button></a><br>
<a href="pesq_termometro_classe.php"><button type="button" class="btn btn-primary btn-lg btn-block">Classe</button></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
  	</body>
</html>