<?php
session_start();
include('../model/conexao.php');

$nome_evento = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$telefone_empresa = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$descricao = mysqli_real_escape_string($conexao, trim(($_POST['descricao'])));
$dataEvento = mysqli_real_escape_string($conexao, trim($_POST['dataEvento']));
$horaEvento = mysqli_real_escape_string($conexao, trim($_POST['hora']));
$usuario = $_SESSION['nome_empresa'];

$sqlEmpresa = "select cnpj from empresa where nome_empresa = '{$usuario}';";
$resultEmpresa = mysqli_query($conexao, $sqlEmpresa);
$rowEmpresa = mysqli_num_rows($resultEmpresa);


if($rowEmpresa != 0) {
	$sql = "INSERT INTO evento (nome_evento, endereco_evento, telefone_evento, descricao_evento, data_evento, hora_evento) 
	
    VALUES ('$nome_evento','$endereco', '$telefone_empresa','$descricao','$dataEvento','$horaEvento')";
	
    header('Location: ../view/painel_empresa.php');
	
    
}else{
    header('Location: ../view/painel_empresa.php');
}

if($conexao->query($sql) === TRUE) { 
    $_SESSION['status_cadastro'] = true;
	header('Location: ../view/painel_empresa.php');
}
else{
	$_SESSION['erro_cadastro'] = true;
	
}

$conexao->close();
header('Location: ../view/painel_empresa.php');

exit;

?>