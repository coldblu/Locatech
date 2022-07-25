<?php //Verifica se o usuario esta logado
	session_start();
	if(isset($_SESSION["ConectedLT"])){
		//echo"<script> window.location='index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Paginal Inicial</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="author" content=""/>
	<meta name="description" content="Locatech - Sistema de locação de dispositivos IOS."/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/> <!--Meta tag responsiva -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>
</head>
<body>
    <div class="MenuContaTop"><!--Menu Superior-->
		<?php
			if(isset($_SESSION["ConectedLT"])){
				echo"<ul align='right'>";				
				echo"<li>Usuario:  <a href='painelDoUsuario.php'> ".$_SESSION["Login"]."</a></li>";
				echo"<li><a href='validacao.php?act=logout'>Desconectar</a></li>";
				echo"</ul>";
			}
			else{
				echo"<ul align='right'>";				
				echo"<li><a href='login.php'>Login</a></li>";
				echo"<li><a href='cadastro.php'>Cadastro</a></li>";
				echo"</ul>";
			}
		?>
	</div>

	<div > <!--Banner-->
		<h1 align='center'> Locatech </h1>
    </div>

	<div class='MenuCentro'> <!--Menu Centro-->
		<ul>
			<li><a href='#'>Produtos</a></li>
			<li><a href='#'>Ajuda</a></li>
			<li><a href='#'>Infos</a></li>
			<li><a href='#'>Sobre nos</a></li>
			<li>
			<form class='SearchBar' action="#">
				<input type="text" placeholder="Search.." name="search" maxlength="30">
				<button class='' type="submit">pesquisar</i></button>
			</form>
			</li>
		</ul>
	</div>

	<div class='Conteudo'>
		Produtos Produtos Produtos Produtos Produtos Produtos 
		Produtos Produtos Produtos Produtos Produtos Produtos 
		Produtos Produtos Produtos Produtos Produtos Produtos 
		Produtos Produtos Produtos Produtos Produtos Produtos 
		Produtos Produtos Produtos Produtos Produtos Produtos 
		Produtos Produtos Produtos Produtos Produtos Produtos Produtos 
	</div>
</body>
</html>