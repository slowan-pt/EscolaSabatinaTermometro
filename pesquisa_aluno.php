
<?php
    include_once("menu_admin.php");
    include_once("conexao.php");

?>	
<?php
		$pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_STRING);
			if($pesquisar){
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
				$resultado=mysqli_query($conn, "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'");
				$linhas=mysqli_num_rows($resultado);
			} 
				else {
					echo "Aluno Não Encontrado";
					header('listar_aluno.php');
	}
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Resultado da Pesquisa <a href="listar_aluno.php"><img src="imagens/addv.png"></a></h1>
  </div>
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
						<!--		<th>#</th>-->
								<th>Nome</th>
						<!--		<th>Login</th>
								<th>E-mail</th>
								<th>Endereço</th>
								<th>Nascimento</th>
								<th>Batismo</th>-->
								<th>Telefone</th>
								<th>Classe</th>
						<!--		<th>Nível</th>-->
								<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
					<!--				<td><?php echo $linhas['id_usuarios']; ?></td>-->
									<td><?php echo $linhas['nome']; ?></td>
					<!--				<td><?php echo $linhas['login']; ?></td>
									<td><?php echo $linhas['email']; ?></td>
									<td><?php echo $linhas['endereco']; ?></td>
									<td><?php echo $linhas['datanascimento']; ?></td>
									<td><?php echo $linhas['databatismo']; ?></td>-->
									<td><?php echo $linhas['telefone1']; ?></td>
									<td><?php echo $linhas['classe']; ?></td>
					<!--				<td><?php echo $linhas['niveis_acesso_id']; ?></td>-->

									
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_usuarios']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_usuarios']; ?>" 
										data-whatevernome="<?php echo $linhas['nome']; ?>"  
										data-whateveremail="<?php echo $linhas['email']; ?>"
										data-whateverlogin="<?php echo $linhas['login']; ?>"
										data-whateversenha="<?php echo $linhas['senha']; ?>"
										data-whateverendereco="<?php echo $linhas['endereco']; ?>"
										data-whateverdatanascimento="<?php echo $linhas['datanascimento']; ?>"
										data-whateverdatabatismo="<?php echo $linhas['databatismo']; ?>"
										data-whatevertelefone1="<?php echo $linhas['telefone1']; ?>"
										data-whatevertelefone2="<?php echo $linhas['telefone2']; ?>"
										data-whateverclasse="<?php echo $linhas['classe']; ?>"
										data-whateverniveis_acesso_id="<?php echo $linhas['niveis_acesso_id']; ?>"
										>Editar</button>
										
										<a href="processa/apagar_usuario_aluno.php?id_usuarios=<?php echo $linhas['id_usuarios']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_usuarios']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_usuarios']; ?></p>
												<b>Nome</b>: <?php echo $linhas['nome']; ?></p>
												<b>Email: </b>: <?php echo $linhas['email']; ?></p>
												<b>login:</b>: <?php echo $linhas['login']; ?></p>
												<b>Senha:</b>: <?php echo $linhas['senha']; ?></p>
												<b>Endereço</b>: <?php echo $linhas['endereco']; ?></p>
												<b>Data de Nascimento</b>: <?php echo $linhas['datanascimento']; ?></p>
												<b>Data de Batismo</b>: <?php echo $linhas['databatismo']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone1']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone2']; ?></p>
												<b>Classe</b>: <?php echo $linhas['classe']; ?></p>
												<b>Nível de Acesso</b>: <?php echo $linhas['niveis_acesso_id']; ?></p>
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
						<h4 class="modal-title" id="ModalLabel">Alunos</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_usuario_aluno.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="text" class="form-control" id="recipient-email">
							</div>
							<div class="form-group">
								<label for="recipient-login" class="control-label">Login:</label>
								<input name="login" type="text" class="form-control" id="recipient-login">
							</div>
							<div class="form-group">
								<label for="recipient-senha" class="control-label">Senha:</label>
								<input name="senha" type="text" class="form-control" id="recipient-senha">
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
								<label for="recipient-databatismo" class="control-label">Data de Batismo:</label>
								<input name="databatismo" type="text" class="form-control" id="recipient-databatismo">
							</div>
							<div class="form-group">
								<label for="recipient-telefone1" class="control-label">Telefone 1:</label>
								<input name="telefone1" type="text" class="form-control" id="recipient-telefone1">
							</div>
							<div class="form-group">
								<label for="recipient-telefone2" class="control-label">Telefone 2:</label>
								<input name="telefone2" type="text" class="form-control" id="recipient-telefone2">
							</div>
							
							<div class="form-group">
								<label for="recipient-classe" class="control-label">Classe:</label>
									<select name="classe" type="text" class="form-control" id="recipient-classe">
										<option value="">Selecione</option>
										<?php
											$result_classe = "SELECT * FROM classes ORDER BY id_classes";
											$resultado_classe2 = mysqli_query($conn, $result_classe);
											while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
												<option required="" value="<?php echo $linhas_classe['id_classes']; ?>"><?php echo $linhas_classe['id_classes']; ?><?php echo " | "; ?><?php echo $linhas_classe['classe']; ?><?php echo " | "; ?><?php echo $linhas_classe['professor']; ?></option> <?php
											}
										?>
									</select>
							  </div>
							<div class="form-group">
								<label for="recipient-niveis_acesso_id" class="control-label">Nível de Acesso:</label>
								<input name="niveis_acesso_id" type="text" class="form-control" id="recipient-niveis_acesso_id">
							</div>
							<input name="id_usuarios" type="hidden" id="id_usuarios">
							
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
				//var recipientemail = button.data('whatever')
				var recipientlogin = button.data('whateverlogin')
				var recipientsenha = button.data('whateversenha')
				var recipientendereco = button.data('whateverendereco')
				var recipientdatanascimento = button.data('whateverdatanascimento')
				var recipientdatabatismo = button.data('whateverdatabatismo')
				var recipienttelefone1 = button.data('whatevertelefone1') 
				var recipienttelefone2 = button.data('whatevertelefone2')
				var recipientclasse = button.data('whateverclasse')
				var recipientnideis_acesso_id = button.data('whateverniveis_acesso_id')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Aluno: ' + recipient)
				modal.find('#id_usuarios').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-login').val(recipientlogin)
				modal.find('#recipient-senha').val(recipientsenha)
				modal.find('#recipient-endereco').val(recipientendereco)
				modal.find('#recipient-datanascimento').val(recipientdatanascimento)
				modal.find('#recipient-databatismo').val(recipientdatabatismo)
				modal.find('#recipient-telefone1').val(recipienttelefone1)
				modal.find('#recipient-telefone2').val(recipienttelefone2)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-niveis_acesso_id').val(recipientnideis_acesso_id)
			})
		</script>
	</body>
</html>