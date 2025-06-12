
<?php
	session_start();
    include_once("menu_admin.php");
    include_once("conexao.php");



//Recebendo Parâmetros
//$ano					= filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
//$mes					= filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
//$trimestre				= filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
$id_classes				= filter_input(INPUT_POST, 'id_classes', FILTER_SANITIZE_STRING);//ID da classe de Interessados-Visitantes//
//$dataapontamento = date('d/m/Y', $dataapontamento2);
$dataapontamento = strtotime($dataapontamento2);
?>


<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h3>Nova Consulta <a href="pesq_termometro_geral.php"><img src="imagens/addv.png" ></a></h3>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">


<?php 
	echo $dataapontamento;
	//$escolha = $mes;
	//Conexão para VRF a quantidade
			$conn_termometro = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$resultado_estudo=mysqli_query($conn_termometro, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento");
			$linhas_estudo=mysqli_num_rows($resultado_estudo);

			//VRF quantos tem na classe de visitantes
		$sql_interessados = mysqli_query($conn_termometro, "SELECT *, COUNT(niveis_acesso_id) qtd_alunos_interessados FROM usuarios WHERE classe =$id_classes");
		while ($dados_interessados = mysqli_fetch_array($sql_interessados)){
			extract($dados_interessados);
			//echo "$qtd_alunos_total";
		}	

			//VRF quantos alunos tem nas classes - pesquisa pelo nível de acesso (Alunos menos que 2)
			$sql = mysqli_query($conn_termometro, "SELECT *, COUNT(niveis_acesso_id) qtd_alunos FROM usuarios WHERE niveis_acesso_id <=2");
				while ($dados = mysqli_fetch_array($sql)){
					extract($dados);}
		
		$qtd_alunos_total = $qtd_alunos-$qtd_alunos_interessados;
		//echo "Alunos: $qtd_alunos<br>";
		echo "Interessados: $qtd_alunos_interessados<br>";
		//echo "Total: $qtd_alunos_total";
		
		//Variáveis e os valores que vieram do BD
		while($linhas_estudo = mysqli_fetch_array($resultado_estudo)){ 
		 	$estudo = $linhas_estudo['estudo'] + $estudo; //Biblia ou Lição
		 	$encontro = $linhas_estudo['encontro'] + $encontro; //Encontro Extra Classe
		 	$presenca = $linhas_estudo['presenca'] + $presenca;
		 	$estudosbiblicos = $linhas_estudo['estudosbiblicos'] + $estudosbiblicos;
		 	$qtdestudosbiblicos = $linhas_estudo['qtdestudosbiblicos'] + $qtdestudosbiblicos;
		 	$qtdofertas = $linhas_estudo['oferta'] + $qtdofertas;}

			$total_estudo = (($estudo*100)/$qtd_alunos_total);
			$total_encontro = (($encontro*100)/$qtd_alunos_total);
			$total_presenca = (($presenca*100)/$qtd_alunos_total);
			$total_estudosbiblicos = (($estudosbiblicos*100)/$qtd_alunos_total);
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
						    <th>Carinha</th> 
						  </tr>
						  <tr>
						    <td>Comunhão</td>
						    <td><?php echo ceil($total_estudo)."%<br>";?></td>
						    <td><?php if ($total_estudo <= 25) {echo "<img src='imagens/25.png' class='img-responsive' class='img-responsive'>";}elseif ($total_estudo >= 26 and $total_estudo <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudo >= 51 and $total_estudo <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Relacionamento_Presenca</td>
						    <td><?php echo ceil($total_presenca)."%<br>";?></td>
						    <td><?php if ($total_presenca <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_presenca >= 26 and $total_presenca <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_presenca >= 51 and $total_presenca <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Relacionamento_encontro</td>
						    <td><?php echo ceil($total_encontro)."%<br>";?></td>
						    <td><?php if ($total_encontro <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_encontro >= 26 and $total_encontro <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_encontro >= 51 and $total_encontro <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Missão_Estudos_Bíblicos</td>
						    <td><?php echo ceil($total_estudosbiblicos)."%<br>";?></td>
						    <td><?php if ($total_estudosbiblicos <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 26 and $total_estudosbiblicos <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 51 and $total_estudosbiblicos <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Missão_QTD_Estudos_Bíblicos</td>
						    <td><?php echo ceil($total_qtdestudosbiblicos);?></td>
						    <td><?php if ($total_qtdestudosbiblicos <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_qtdestudosbiblicos >= 26 and $total_qtdestudosbiblicos <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_qtdestudosbiblicos >= 51 and $total_qtdestudosbiblicos <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Ofertas</td>
						    <td><?php echo "R$ " ;echo ceil($total_qtdofertas);?></td>
						    <td><?php if ($total_qtdofertas <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 26 and $total_qtdofertas <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 51 and $total_qtdofertas <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
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
						    <td><?php echo "$qtd_alunos_total";?></td>
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