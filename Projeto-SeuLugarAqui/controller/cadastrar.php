<?php
session_start();
include('../model/conexao.php');

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); //funcao trim retira o espaço da frente e de trás.
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select usuario from usuario where usuario = '$usuario';";
$result = mysqli_query($conexao, $sql); 
$row = mysqli_num_rows($result);

if($row > 0) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ../view/index2.php');
    exit;
}
else if( $nome == '' or $usuario == '' or $email == '' or $telefone == '' or $senha == ''){
    header('Location: ../view/index2.php');
}else{
    $sql = "INSERT INTO usuario (nome, usuario, email, telefone,senha, data_cadastro) 
    VALUES ('$nome', '$usuario', '$email', '$telefone','$senha', NOW())";
}

if($conexao->query($sql) === TRUE) { 
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: ../view/index2.php');
exit;

?>