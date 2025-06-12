
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");

?>	
<?php
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM visitantes");
	$linhas=mysqli_num_rows($resultado);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Visitantes Cadastrados <a href="cad_usuario_visitante.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
								<th>#</th>
								<th>Nome</th>
						<!--		<th>Login</th>-->
								<th>E-mail</th>
						<!--		<th>Endereço</th>
								<th>Nascimento</th>
								<th>Batismo</th>-->
								<th>Telefone</th>
						<!--		<th>Telefone</th>
								<th>Nível</th>-->
								<th>Ações</th>
							  </tr>
							</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['id_visitantes']; ?></td>
									<td><?php echo $linhas['nome']; ?></td>
									<td><?php echo $linhas['email']; ?></td>
					<!--				<td><?php echo $linhas['endereco']; ?></td>
									<td><?php echo $linhas['datanascimento']; ?></td>-->
									<td><?php echo $linhas['telefone1']; ?></td>
									<td><?php echo $linhas['estudobiblico']; ?></td>
									<td><?php echo $linhas['visita']; ?></td>
									
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_visitantes']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_visitantes']; ?>" 
										data-whatevernome="<?php echo $linhas['nome']; ?>"  
										data-whateveremail="<?php echo $linhas['email']; ?>"
										data-whateverendereco="<?php echo $linhas['endereco']; ?>"
										data-whateverdatanascimento="<?php echo $linhas['datanascimento']; ?>"
										data-whatevertelefone1="<?php echo $linhas['telefone1']; ?>"
										data-whateverestudobiblico="<?php echo $linhas['estudobiblico']; ?>"
										data-whatevervisita="<?php echo $linhas['visita']; ?>"
										>Editar</button>
										
										<a href="processa/apagar_usuario_visitante.php?id_visitantes=<?php echo $linhas['id_visitantes']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_visitantes']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_visitantes']; ?></p>
												<b>Nome</b>: <?php echo $linhas['nome']; ?></p>
												<b>Email: </b>: <?php echo $linhas['email']; ?></p>
												<b>Endereço</b>: <?php echo $linhas['endereco']; ?></p>
												<b>Data de Nascimento</b>: <?php echo $linhas['datanascimento']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone1']; ?></p>
												<b>Estudo Bíblico</b>: <?php echo $linhas['estudobiblico']; ?></p>
												<b>Visita</b>: <?php echo $linhas['visita']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
								<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ModalLabel">Visitantes</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_visitante.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="text" class="form-control" id="recipient-email">
							</div>
							<div class="form-group">
								<label for="recipient-endereco" class="control-label">Endereço:</label>
								<input name="endereco" type="text" class="form-control" id="recipient-endereco">
							</div>
							<div class="form-group">
								<label for="recipient-datanascimento" class="control-label">Data de Nascimento:</label>
								<input name="datanascimento" type="text" class="form-control" id="recipient-datanascimento">
							</div>
							<div class="form-group">
								<label for="recipient-telefone1" class="control-label">Telefone 1:</label>
								<input name="telefone1" type="text" class="form-control" id="recipient-telefone1">
							</div>
							<div class="form-group">
								<label for="recipient-estudobiblico" class="control-label">Estudo Bíblico:</label>
								<select class="form-control" name="estudobiblico" id="recipient-estudobiblico" required="">
						          <option value="sim">Sim</option>
						          <option value="nao">Não</option>
						        </select>
							</div>
							<div class="form-group">
								<label for="recipient-visita" class="control-label">Aceita Visita:</label>
								<select class="form-control" name="visita" id="recipient-visita" required="">
						          <option value="sim">Sim</option>
						          <option value="nao">Não</option>
						        </select>
							</div>
							<input name="id_visitantes" type="hidden" id="id_visitantes">
							
							<!--Ações-->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#Modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientemail = button.data('whateveremail')
				var recipientendereco = button.data('whateverendereco')
				var recipientdatanascimento = button.data('whateverdatanascimento')
				var recipienttelefone1 = button.data('whatevertelefone1')
				var recipientestudobiblico = button.data('whateverestudobiblico')
				var recipientvisita = button.data('whatevervisita')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Visitante: ' + recipient)
				modal.find('#id_visitantes').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-endereco').val(recipientendereco)
				modal.find('#recipient-datanascimento').val(recipientdatanascimento)
				modal.find('#recipient-telefone1').val(recipienttelefone1)
				modal.find('#recipient-estudobiblico').val(recipientestudobiblico)
				modal.find('#recipient-visita').val(recipientvisita)
			})
		</script>
	</body>
</html>