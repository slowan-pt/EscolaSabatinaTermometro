<?php
session_start();
include_once("../conexao.php");

$professor 				= filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_STRING);// $_POST["email"];//
$professorassociado 	= filter_input(INPUT_POST, 'professorassociado', FILTER_SANITIZE_STRING);// $_POST["endereco"];//
$secretario 			= filter_input(INPUT_POST, 'secretario', FILTER_SANITIZE_STRING);// $_POST["complemento"];//
$classe					= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$ano					= filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$trimestre				= filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$nomedaclasse			= filter_input(INPUT_POST, 'nomedaclasse', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$numerodaclasse			= filter_input(INPUT_POST, 'numerodaclasse', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_classe = " INSERT INTO `classes` (
`id_classes`, 
`professor`, 
`professorassociado`, 
`secretario`, 
`classe`, 
`ano`, 
`trimestre`, 
`nomedaclasse`, 
`numerodaclasse`) 
VALUES (
NULL, 
'$professor', 
'$professorassociado', 
'$secretario', 
'$classe', 
'$ano', 
'$trimestre', 
'$nomedaclasse', 
'$numerodaclasse')";
$resultado_classe = mysqli_query($conn, $result_classe);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../listar_classe.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../cad_classe.php");
}
