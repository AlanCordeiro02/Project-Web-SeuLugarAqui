<?php
session_start();
include('../model/conexao.php');

//verifica se os campos de login foram preenchidos antes do envio.
if( empty( $_POST['email'] ) || empty( $_POST['senha'] ) )  {
    header('Location: ../view/index2.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email'] );
$senha = mysqli_real_escape_string($conexao, $_POST['senha'] );

if($query = " select * from usuario where email = '{$email}' and senha = md5('{$senha}') "){
    $result = mysqli_query($conexao, $query); 

    $row = mysqli_num_rows($result); 
    
    if($row > 0) {
        $usuario_bd = mysqli_fetch_assoc($result);
        $_SESSION['nome'] = $usuario_bd['nome'];
        header('Location: ../view/painel.php');
        exit();
    }else {
        $query = " select * from empresa where email_empresa = '{$email}' and senha_empresa = md5('{$senha}') ";
        $result = mysqli_query($conexao, $query);

        $row = mysqli_num_rows($result);
            
        if($row > 0) {
                $empresa_bd = mysqli_fetch_assoc($result);
                $_SESSION['nome_empresa'] = $empresa_bd['nome_empresa'];
                header('Location: ../view/painel_empresa.php');
                exit();
        }
        
    }    
}else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../view/index2.php');
    exit();
}
