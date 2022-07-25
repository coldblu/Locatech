<?php //Verifica se o usuario esta logado
	session_start();
	if(isset($_SESSION["ConectedLT"])){
		echo"<script> window.location='index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="author" content=""/>
	<meta name="description" content="Locatech - Sistema de locação de dispositivos IOS."/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/> <!--Meta tag responsiva -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>
</head>
<body>
	<div class='Acesso'>
		<div class="Formulario">
			<h2 align='center'>Cadastro</h2>
			<form action="inserir.php?act=CadUsuario" method="post">
				<div class="">Login: </div>
				<div ><input class="" type="text" name="login" maxlength='35' required></div>
				<div class="">Senha: </div>
				<div ><input class="" type="password" name="senha" maxlength='35' required></div>
				<br/>
				<input class="buttons" type="submit" value="Cadastrar">
				<a class="buttons" href='index.php'>Voltar</a>
			</form>
			<br/><br/>
			
		</div>
	</div>
</body>
</html>