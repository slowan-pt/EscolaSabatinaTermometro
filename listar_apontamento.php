
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");

?>	
<?php
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM apontamento");
	$linhas=mysqli_num_rows($resultado);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Apontameto <a href="cad_apontamento.php"><img src="imagens/addv.png"></a></h1>

  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		 <tr>
								<th>Classe</th>
								<th>Data apontamento</th>
								<th>Quantos Estudaram a Bíblia ou Lição Diariamente</th>
								<th>Quantos Praticaram Ações Solidárias</th>
								<th>Quantos Particiaram Extra Classe</th>
								<th>Quantos Fizeram Contatos Missionários</th>
								<th>Quantos Deram Estudos Bíblicos</th>
								<th>Quantos Interessados Recebendo Estudos</th>
								<th>Oferta</th>
		</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['classe']; ?></td>
									<td><?php echo $linhas['dataapontamento']; ?></td>
									<td><?php echo $linhas['estudo']; ?></td>
									<td><?php echo $linhas['acao']; ?></td>
									<td><?php echo $linhas['encontro']; ?></td>
									<td><?php echo $linhas['contato']; ?></td>
									<td><?php echo $linhas['estudosbiblicos']; ?></td>
									<td><?php echo $linhas['qtdestudosbiblicos']; ?></td>
									<td><?php echo "R$ "; echo $linhas['oferta']; echo ",00";?></td>
							<td>
										
										
									</td>
								</tr>

						
								<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
			</div>
			   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>		
	</body>
</html>