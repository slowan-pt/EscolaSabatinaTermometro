<?php
session_start();
include_once("../conexao.php");

$nome 				= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);// $_POST["nome"];//
$email 				= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);// $_POST["email"];//
$endereco 			= filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);// $_POST["endereco"];//
$datanascimento		= filter_input(INPUT_POST, 'datanascimento', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$telefone1 			= filter_input(INPUT_POST, 'telefone1', FILTER_SANITIZE_STRING);// $_POST["telefone1"];//
$estudobiblico 		= filter_input(INPUT_POST, 'estudobiblico', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//
$visita 			= filter_input(INPUT_POST, 'visita', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = " INSERT INTO `visitantes` (`id_visitantes`, `nome`, `email`, `endereco`,  `datanascimento`, `telefone1`, `estudobiblico`, `visita`) VALUES (NULL, '$nome', '$email', '$endereco', '$datanascimento', '$telefone1', '$estudobiblico', '$visita')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../listar_visitante.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../cad_usuario_visitante.php");
}
