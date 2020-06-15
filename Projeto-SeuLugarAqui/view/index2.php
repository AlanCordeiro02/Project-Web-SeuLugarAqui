<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--Site se adequa a tela do dispositivo do usuario--> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SeuLugarAqui</title>
		<meta name="description" content="SeuLugarAqui - Melhor site para encontrar lugares">
		<meta name="robots" content="index2">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../imagens/logoPequena.png" type="image/x-icon">
		<link rel="icon" href="../imagens/logoPequena.png" type="image/x-icon">
	
	</head>

	<body>
		<!--tag especifica para cabeçalho-->
		<header class="header container">
			<a href="#" class="logo"></a>
			<button class="btLogin">Login</button>
			<form action="../controller/login.php" method="POST">
				<ul class="logar register">
					<buttom class="btCloseLogin btClose" href="#"><i class="fa fa-times"></i></buttom>
						
					<li class="textLogin">Login</li>
					<li><input type="text" name="email" placeholder="Email"></li>
								
					<li><input type="password" name="senha" placeholder="Senha"></li>
					<li><button  class="btLogarInterno"><a >Entrar</a></button></li>
				</ul>
			</form>
			<form action="../controller/login.php" method="POST">
				<ul class="menuTelaMaior">
					<li> </li>
						<input type="text" name="email" placeholder="Email">
					<li></li>
						<input type="password" name="senha" placeholder="Senha">
					<li><button class="btLogar"><a >Entrar</a></button></li>
				</ul>
			</form>
			
		</header>
		<!--final cabeçalho-->

		<!--tag especifica para conteudo principal-->
		<main class="conteudoPrincipal container" >
			<div class="conteudo">
				<div class="title">
					<h3>Chegamos</h3>
					<h1>Seremos seu guia de eventos na cidade</h1>
					<h2>Aqui você pode encontrar todos os eventos da cidade</h2>
					<h2>Faça seu cadastro</h2>
				</div>

				<div class="buttons">

					<button class="btCadastro btUser bgRed">Usuário <i class="fa fa-arrow-circle-right"></i></button>
					<button class="btCadastro btCompany bgRed">Empresa <i class="fa fa-arrow-circle-right"></i></button>
					
					<?php
						if(isset($_SESSION['status_cadastro'])) {
							echo " 
								<li class='notification'>Cadastro efetuado!</li>
								<li class='notification'>Faça login informando o seu e-mail e senha.</li>
							";
						}
							unset($_SESSION['status_cadastro']);
					?>

					<?php
						if(isset($_SESSION['usuario_existe'])) {
							echo "
								<li class='notification'>O usuário escolhido já existe. Informe outro e tente novamente.</li>
							";
						}
							unset($_SESSION['usuario_existe']);
					?>

					<?php
						if(isset($_SESSION['status_cadastro_empresa'])) {
							echo "
								<li class='notification'>Cadastro efetuado!</li>
								<li class='notification'>Faça login informando o e-mail e senha.</li>
							";
						}
							unset($_SESSION['status_cadastro_empresa']);
					?>

					<?php
						if(isset($_SESSION['empresa_existe'])) {
							echo "
								<li class='notification'>CNPJ informado já cadastrado. Informe outro e tente novamente.</li>
							";
						}
							unset($_SESSION['empresa_existe']);
					?>



					<form action="../controller/cadastrar.php" method="POST">	
						<ul class="registerUser register">

							<buttom class="btCloseUser btClose" href="#"><i class="fa fa-times"></i></buttom>
							
							<li class="textCadastrar">Cadastrar Usuário</li>
							<li><input type="text" name="nome" placeholder="Nome Completo"></li>
							<li><input type="text" name="usuario" placeholder="Usuario"></li>
							<li><input type="text" name="email" placeholder="Email"></li>
							<li><input type="text" name="telefone" placeholder="Telefone"></li>
							<li><input type="password" name="senha" placeholder="Senha"></li>
							<li><button type="submit" class="btLogarInterno">Cadastrar</button></li>

						</ul>
					</form>
					<form action="../controller/cadastrar_empresa.php" method="post">	
						<ul class="registerCompany register">

							<buttom class="btCloseCompany btClose" href="#"><i class="fa fa-times"></i></buttom>
							
							<li class="textCadastrar">Cadastrar Empresa</li>
							<li><input type="text" name="razao" placeholder="Razão Social"></li>
							<li><input type="text" name="cnpj" placeholder="CNPJ"></li>
							<li><input type="text" name="email" placeholder="Email"></li>
                            <li><input type="text" name="endereco" placeholder="Endereço"></li>
                            <li><input type="text" name="telefone" placeholder="Telefone"></li>
							<li><input type="password" name="senha" placeholder="Senha"></li>
							<li><button type="submit" class="btLogarInterno">Cadastrar</button></li>
							
						</ul>
					</form>	
				</div>
			</div>		
		</main>
		<!--final principal-->

		<!--tag especifica para rodape-->
		<footer class="rodape container ">
			<div class="socialIcons">
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-instagram"></i></a>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$(".btLogin").click(function(){
				$(".logar").show();
			})

			$(".btCloseLogin").click(function(){
				$(".logar").hide();
			})
		</script>
		<script>
			$(".btUser").click(function(){
				$(".registerUser").show();
			})

			$(".btCloseUser").click(function(){
				$(".registerUser").hide();
			})
		</script>
		<script>
			$(".btCompany").click(function(){
				$(".registerCompany").show();
			})

			$(".btCloseCompany").click(function(){
				$(".registerCompany").hide();
			})
		</script>

	</body>
</html