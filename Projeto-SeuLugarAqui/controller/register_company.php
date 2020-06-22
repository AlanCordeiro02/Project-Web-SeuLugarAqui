<?php
session_start();
include('../model/connection.php');

$nome_empresa = mysqli_real_escape_string($conexao, trim($_POST['razao']));
$cnpj = mysqli_real_escape_string($conexao, trim($_POST['cnpj']));
$email_empresa = mysqli_real_escape_string($conexao, trim($_POST['email']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$telefone_empresa = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$senha_empresa = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sqlEmpresa = "select cnpj from empresa where cnpj = '{$cnpj}';";
$resultEmpresa = mysqli_query($conexao, $sqlEmpresa);
$rowEmpresa = mysqli_num_rows($resultEmpresa);

if($rowEmpresa > 0) {
    $_SESSION['empresa_existe'] = true;
    header('Location: ../view/index.php');
    
}
else if( $nome_empresa == '' or $cnpj == '' or $email_empresa == '' or $endereco == '' or 
$telefone_empresa == '' or $senha_empresa == ''){
    header('Location: ../view/index.php');
}else{
    $sqlEmpresa = "INSERT INTO empresa (nome_empresa, cnpj, email_empresa, endereco, telefone_empresa , senha_empresa, data_empresa) 
    VALUES ('$nome_empresa', '$cnpj', '$email_empresa', '$endereco', '$telefone_empresa','$senha_empresa', NOW())";
}

if($conexao->query($sqlEmpresa) === TRUE) { 
    $_SESSION['status_cadastro_empresa'] = true;
}

$conexao->close();

header('Location: ../view/index.php');
exit;

?>