
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");
?>	
<?php
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM classes");
	$linhas=mysqli_num_rows($resultado);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Classes Cadastradas <a href="cad_classe.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		 <tr>
								<th>#</th>
								<th>Professor</th>
								<th>Número da Classe</th>
								<th>Nome da Classe</th>
								<th>Classe de</th>
								<th>Ano</th>
								<th>Trimestre</th>
								<th>Pontuação</th>
								<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['id_classes']; ?></td>
									<td><?php echo $linhas['professor']; ?></td>
									<td><?php echo $linhas['numerodaclasse']; ?></td>
									<td><?php echo $linhas['nomedaclasse']; ?></td>
									<td><?php echo $linhas['classe']; ?></td>
									<td><?php echo $linhas['ano']; ?></td>
									<td><?php echo $linhas['trimestre']; ?></td>
									<td><?php echo $linhas['pontuacao']; ?></td>

									
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_classes']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_classes']; ?>" 
										data-whateverprofessor="<?php echo $linhas['professor']; ?>"
										data-whateverprofessorassociado="<?php echo $linhas['professorassociado']; ?>"
										data-whateversecretario="<?php echo $linhas['secretario']; ?>"
										data-whatevernumerodaclasse="<?php echo $linhas['numerodaclasse']; ?>"
										data-whatevernomedaclasse="<?php echo $linhas['nomedaclasse']; ?>"
										data-whateverclasse="<?php echo $linhas['classe']; ?>"
										data-whateverano="<?php echo $linhas['ano']; ?>"
										data-whatevertrimestre="<?php echo $linhas['trimestre']; ?>"
										data-whateverpontuacao="<?php echo $linhas['pontuacao']; ?>"
										>Editar</button>
										
										<a href="processa/apagar_classe.php?id_classes=<?php echo $linhas['id_classes']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_classes']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['classe']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_classes']; ?></p>
												<b>Professor: </b>: <?php echo $linhas['professor']; ?></p>
												<b>Professor Associado</b>: <?php echo $linhas['professorassociado']; ?></p>
												<b>Secretário</b>: <?php echo $linhas['secretario']; ?></p>
												<b>Número da Classe</b>: <?php echo $linhas['numerodaclasse']; ?></p>
												<b>Nome da Classe</b>: <?php echo $linhas['nomedaclasse']; ?></p>
												<b>Classe de</b>: <?php echo $linhas['classe']; ?></p>
												<b>Ano</b>: <?php echo $linhas['ano']; ?></p>
												<b>Trimestre</b>: <?php echo $linhas['trimestre']; ?></p>
												<b>Pontuação</b>: <?php echo $linhas['pontuacao']; ?></p>
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
						<h4 class="modal-title" id="ModalLabel">Classes</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_classe.php" enctype="multipart/form-data" autocomplete="off">
							
							<div class="form-group">
								<label for="recipient-professor" class="control-label">Professor:</label>
								<input name="professor" type="text" class="form-control" id="recipient-professor" required="">
							</div>

							<div class="form-group">
								<label for="recipient-professorassociado" class="control-label">Professor Associado:</label>
								<input name="professorassociado" type="text" class="form-control" id="recipient-professorassociado">
							</div>

							<div class="form-group">
								<label for="recipient-numerodaclasse" class="control-label">Número da Classe:</label>
								<input name="numerodaclasse" type="text" class="form-control" id="recipient-numerodaclasse">
							</div>

							<div class="form-group">
								<label for="recipient-nomedaclasse" class="control-label">Nome da Classe:</label>
								<input name="nomedaclasse" type="text" class="form-control" id="recipient-nomedaclasse">
							</div>

							  <div class="form-group">
								<label for="recipient-classe" class="control-label">Classe</label>
								  <select name="classe" type="text" class="form-control" id="recipient-classe" class="form-control" required="">				  
								  		<option value="0">Selecione</option>
									  <option value="Rol">Rol do Berço</option>
									  <option value="Jardim">Jardim</option>
									  <option value="Primarios">Primários</option>
									  <option value="Juvenis">Juvenis</option>
									  <option value="Adolescentes">Adolescentes</option>
									  <option value="Jovens">Jovens</option>
									  <option value="Adultos">Adultos</option>
									  <option value="Interessados-Visitantes">Interessados/Visitantes</option>
									  <option value="Discipulado">Discipulado</option>
									</select>
							  </div>
							<div class="form-group">
								<label for="recipient-ano" class="control-label">Ano</label>
								 <select name="ano" type="text" class="form-control" id="recipient-ano" class="form-control" required="">
									  <option value="0">Selecione</option>
									  <option value="2019">2019</option>
									  <option value="2020">2020</option>
									  <option value="2021">2021</option>
									  <option value="2022">2022</option>
									  <option value="2023">2023</option>
									  <option value="2024">2024</option>
									  <option value="2025">2025</option>
									</select>
							  </div>

							  <div class="form-group">
								<label for="recipient-classe" class="control-label">Trimestre</label>
								 <select name="trimestre" type="text" class="form-control" id="recipient-trimestre" class="form-control" required="">
									  <option value="0">Selecione</option>
									  <option value="1">1º</option>
									  <option value="2">2º</option>
									  <option value="3">3º</option>
									  <option value="4">4º</option>
									</select>
								</div>

								<div class="form-group">
									<label for="recipient-pontuacao" class="control-label">Pontuação:</label>
									<input name="pontuacao" type="text" class="form-control" id="recipient-pontuacao">
								</div>

							<input name="id_classes" type="hidden" id="id_classes">
							
							<!--Ações-->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Alterar</button>
							</div>
						</edit>
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
				var recipientprofessor = button.data('whateverprofessor')
				var recipientprofessorassociado = button.data('whateverprofessorassociado')
				var recipientsecretario = button.data('whateversecretario')
				var recipientnumerodaclasse = button.data('whatevernumerodaclasse')
				var recipientnomedaclasse = button.data('whatevernomedaclasse')
				var recipientclasse = button.data('whateverclasse')
				var recipientano = button.data('whateverano')
				var recipienttrimestre = button.data('whatevertrimestre')
				var recipientpontuacao = button.data('whateverpontuacao')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Classe: ' + recipient)
				modal.find('#id_classes').val(recipient)
				modal.find('#recipient-professor').val(recipientprofessor)
				modal.find('#recipient-professorassociado').val(recipientprofessorassociado)
				modal.find('#recipient-secretario').val(recipientsecretario)
				modal.find('#recipient-numerodaclasse').val(recipientnumerodaclasse)
				modal.find('#recipient-nomedaclasse').val(recipientnomedaclasse)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-ano').val(recipientano)
				modal.find('#recipient-trimestre').val(recipienttrimestre)
				modal.find('#recipient-pontuacao').val(recipientpontuacao)

			})
		</script>
	</body>
</html>