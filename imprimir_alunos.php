<?php	

	include_once("conexao.php");
	$impressao = "";	
/*	$impressao = '<table border=1';	
	$impressao .= '<thead>';
	$impressao .= '<tr>';
	$impressao .= '<th>Nome</th>';
	$impressao .= '<th>Login</th>';
	$impressao .= '<th>E-mail</th>';
	$impressao .= '<th>Senha</th>';
	$impressao .= '<th>Endereço</th>';
	$impressao .= '<th>Data Nascimento</th>';
	$impressao .= '<th>Data Batismo</th>';
	$impressao .= '<th>Tel</th>';
	$impressao .= '<th>Tel</th>';
	$impressao .= '<th>Acesso</th>';
	$impressao .= '<th>Classe</th>';
	$impressao .= '</tr>';
	$impressao .= '</thead>';
	$impressao .= '<tbody>';*/
	
	$result_alunos = "SELECT nome,login,email,senha,endereco,datanascimento,databatismo,telefone1,telefone2,niveis_acesso_id,classe FROM usuarios";
	$resultado_alunos = mysqli_query($conn, $result_alunos);
	while($linhas_alunos = mysqli_fetch_assoc($resultado_alunos)){
		//echo "Nome: ";
		$impressao .= $linhas_alunos['nome'] . 					"<br><i><u><b> Acesso</i></u><br><b>Login:</b> </b>";
		$impressao .= $linhas_alunos['login'] . 				" | <b>E-mail:  </b>";
		$impressao .= $linhas_alunos['email'] . 				" | <b>Acesso: </b>";
		$impressao .= $linhas_alunos['niveis_acesso_id'] . 		" | <b>Senha: </b>";		
		$impressao .= $linhas_alunos['senha'] . 				" <br><i><u><b> Dados Pessoais</i></u><br><b>Endereço:</b></b>";
		$impressao .= $linhas_alunos['endereco'] . 				" | <b>Nascimento: </b>";		
		$impressao .= $linhas_alunos['datanascimento'] . 		" | <b>Batismo: </b>";		
		$impressao .= $linhas_alunos['databatismo'] . 			" <br> <b>Tel: </b>";		
		$impressao .= $linhas_alunos['telefone1'] . 			" | <b>Tel: </b>";		
		$impressao .= $linhas_alunos['telefone2'] . 			" | <b>Classe: </b>";		
		$impressao .= $linhas_alunos['classe'] . 				"<hr>";

				
	}
	
	//$impressao .= '</tbody>';
	//$impressao .= '</table';


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h2 style="text-align: center;">Usuários Cadastrados Escola Sabatina Fonseca</h2>
			'. $impressao .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Alunos_Esc_Sab_Fonseca.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>