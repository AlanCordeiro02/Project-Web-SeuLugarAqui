<?php
session_start();
//unset($_SESSION['nomedasessao']);
session_destroy();
header('Location: ../view/index2.php');
exit();