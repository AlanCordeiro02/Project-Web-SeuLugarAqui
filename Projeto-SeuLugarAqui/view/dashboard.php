<?php
session_start();
include('../controller/check_login.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--Site se adequa a tela do dispositivo do usuario--> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SeuLugarAqui</title>
		<meta name="description" content="SeuLugarAqui - Melhor site para encontrar lugares">
		<meta name="robots" content="index">
		<link rel="stylesheet" type="text/css" href="../css/style_user.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../imagens/logoPequena.png" type="image/x-icon">
		<link rel="icon" href="../imagens/logoPequena.png" type="image/x-icon">
	
	</head>

	<body>
		<!--tag especifica para cabeçalho-->
		<header class="header container">
			<a href="#" class="logo"></a>

			<button class="btMenu"><i class="fa fa-bars"></i></button>
			<form action="" method="post">
				<ul class="menu">
					<buttom class="btClose"><i class="fa fa-times"></i></buttom>
				
					<li class="nameUser">Olá, <?php echo $_SESSION['nome']; ?></li>
					<li class="textUserCompany change"><a href="#">Alterar Informações</a></li>
					<li class="textUserCompany"><a href="../controller/logout.php">Sair</a></li>

				</ul>
			</form>

			<form action="" method="post">
				<ul class="menuTelaMaior">
					<li class="user">Olá, <?php echo $_SESSION['nome']; ?></li>
					<li class="change"><a href="#">Alterar Informações</a></li>
					<li><a href="../controller/logout.php">Sair</a></li>
				</ul>
			</form>

			<form action="" method="post">
				<ul class="register">
					<buttom class="btCloseUser btClose" href="#"><i class="fa fa-times"></i></buttom>
							
					<li class="textAlterar">Alterar Informações</li>
					<li><input type="text" name="nome" placeholder="Nome Completo"></li>
					<li><input type="text" name="email" placeholder="Email"></li>
					<li><input type="text" name="telefone" placeholder="Telefone"></li>
					<li><input type="password" name="senha" placeholder="Senha"></li>
					<li><button class="btLogarInterno"><a href="#">Alterar</a></button></li>

				</ul>

			</form>

		</header>
		<!--final cabeçalho-->

		<!--campo de busca-->
		<div class="search container">
			<!--<input type="text" name="" placeholder="Pesquise">-->
			<!--<i class="fa fa-search"></i>-->
			<li><a href = "list_events.php">Listar Eventos</a></li>
			
		</div>
		<!--fim campo de busca-->

		<!--tag especifica para conteudo principal-->
		<main class="conteudoPrincipal container" >
		
			<article class="conteudo radius">

				<img   src="../imagens/Bares.jpg">

				<div class="text">
					<h3>Bares<h3>
					<h4>Todos os bares da região</h4>
					<p>Listamos os melhores bares!</p>
				</div>

			</article>

			<article class="conteudo  radius">

				<img  src="../imagens/Restaurantes.jpg">

				<div class="text">
					<h3>Restaurantes<h3>
					<h4>Todos os restaurantes da região</h4>
					<p>Encontre aqui os melhores restaurantes!</p>
				</div>

			</article>

			<article class="conteudo radius">

				<img src="../imagens/Eventos.jpg" >

				<div class="text">
					<h3>Eventos<h3>
					<h4>Todos os eventos da região</h4>
					<p>As festas mais badaladas do momento!</p>
				</div>

			</article>
		</main>
		<!--final principal-->

		<!--tag especifica para rodape-->
		<footer class="rodape container ">
			<div class="socialIcons">
				<a href="https://www.facebook.com/Alancordeir0"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="https://www.instagram.com/alancordeiro02"><i class="fa fa-instagram"></i></a>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$(".btMenu").click(function(){
				$(".menu").show();
			})

			$(".btClose").click(function(){
				$(".menu").hide();
			})
		</script>
		<script>
			$(".change").click(function(){
				$(".register").show();
			})

			$(".btClose").click(function(){
				$(".register").hide();
			})
		</script>
		
	
	</body>
</html