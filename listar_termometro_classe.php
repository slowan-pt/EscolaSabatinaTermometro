
<?php
	session_start();
    include_once("menu_admin.php");
    include_once("conexao.php");



//Recebendo Parâmetros
$classe					= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
$dataapontamento = strtotime($dataapontamento2);
?>


<div class="container theme-showcase" role="main">      
  <div class="page-header">
	
	<h3>Nova Consulta <a href="pesq_termometro_classe.php"><img src="imagens/adda.png"></a></h3>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">


<?php 


//VRF qual o valor do Mês/Sábado
	//Conexão para VRF a quantidade
			echo "$dataapontamento";
			$conn_estudo = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$resultado_estudo=mysqli_query($conn_estudo, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
			$linhas_estudo=mysqli_num_rows($resultado_estudo);

			//VRF quantos alunos tem nas classes
			$sql = mysqli_query($conn_estudo, "SELECT *, COUNT(classe) qtd_alunos FROM usuarios WHERE classe = $classe");
				while ($dados = mysqli_fetch_array($sql)){
					extract($dados);
			//echo "$qtd_alunos";
		}
		
		
		//Variáveis e os valores que vieram do BD
		while($linhas_estudo = mysqli_fetch_array($resultado_estudo)){ 
		 	$estudo = $linhas_estudo['estudo'] + $estudo; //Biblia ou Lição
		 	$encontro = $linhas_estudo['encontro'] + $encontro; //Encontro Extra Classe
		 	$presenca = $linhas_estudo['presenca'] + $presenca;
		 	$estudosbiblicos = $linhas_estudo['estudosbiblicos'] + $estudosbiblicos;
		 	$qtdestudosbiblicos = $linhas_estudo['qtdestudosbiblicos'] + $qtdestudosbiblicos;
		 	$qtdofertas = $linhas_estudo['oferta'] + $qtdofertas;}

			$total_estudo = (($estudo*100)/$qtd_alunos);
			$total_encontro = (($encontro*100)/$qtd_alunos);
			$total_presenca = (($presenca*100)/$qtd_alunos);
			$total_estudosbiblicos = (($estudosbiblicos*100)/$qtd_alunos);
			$total_qtdestudosbiblicos = $qtdestudosbiblicos;
			$total_qtdofertas = $qtdofertas;

?>	
						<html>
						<head>
						<style>
						table {
						  font-family: arial, sans-serif;
						  border-collapse: collapse;
						  width: 100%;
						}

						td, th {
						  border: 1px solid #dddddd;
						  text-align: left;
						  padding: 8px;
						}

						tr:nth-child(even) {
						  background-color: #CBE2F1;
						}
						</style>
						</head>
						<body>
						<h1>Termômetro da Igreja - <?php echo "Data: $dataapontamento2"; ?> </h1>
						<!-- Tabela com Resultados  -->
						<h3><img src="imagens/t.png" class="img-responsive" ></h3>
						<table style="width:100%">
						  <tr>
						    <th>Item</th>
						    <th>Quantidade/Porcentagem</th> 
						  </tr>
						  <tr>
						    <td>Comunhão</td>
						    <td><?php echo ceil($total_estudo)."%<br>";?></td>
						  </tr>
						  <tr>
						    <td>Relacionamento_Presenca</td>
						    <td><?php echo ceil($total_presenca)."%<br>";?></td>
						  </tr>
						  <tr>
						    <td>Relacionamento_encontro</td>
						    <td><?php echo ceil($total_encontro)."%<br>";?></td>
						  </tr>
						  <tr>
						    <td>Missão_Estudos_Bíblicos</td>
						    <td><?php echo ceil($total_estudosbiblicos)."%<br>";?></td>
						  </tr>
						  <tr>
						    <td>Missão_QTD_Estudos_Bíblicos</td>
						    <td><?php echo ceil($total_qtdestudosbiblicos);?></td>
						  </tr>
						  <tr>
						    <td>Ofertas</td>
						    <td><?php echo "R$ " ;echo ceil($total_qtdofertas);?></td>
						  </tr>
						</table>

						<!-- Valores Retornados da Consulta do Banco  -->
						<h3>Valores da Consulta</h3>
						<table style="width:100%">
						  <tr>
						    <th>Item</th>
						    <th>Quantidade</th> 
						  </tr>
						  <tr>
						    <td>QTD Estudo lição</td>
						    <td><?php echo "$estudo";?></td>
						  </tr>
						  <tr>
						    <td>QTD Presentes na ES</td>
						    <td><?php echo "$presenca";?></td>
						  </tr>
						  <tr>
						    <td>QTD Presentes em encontro</td>
						    <td><?php echo "$encontro";?></td>
						  </tr>
						  <tr>
						    <td>QTD Alunos Dando Estudos</td>
						    <td><?php echo "$estudosbiblicos";?></td>
						  </tr>
						  <tr>
						    <td>QTD Estudos Dados</td>
						    <td><?php echo "$qtdestudosbiblicos";?></td>
						  </tr>
						  <tr>
						    <td>QTD Alunos Matriculados</td>
						    <td><?php echo "$qtd_alunos";?></td>
						  </tr>
						</table>



						</body>
						</html>

						<!--

-->
			</div>		
			</div>	
			   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>	
	</body>
</html>