<?php
//session_start();
if(!$_SESSION['nome_empresa']) {
    header('Location: index.php');
    exit();
}