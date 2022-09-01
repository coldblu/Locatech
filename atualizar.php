<?php
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
	if($_GET["act"]=="Finalizar"){
		date_default_timezone_set('America/Sao_Paulo');
		$hoje = date("Y-m-d");
		$codigo = $_POST["codigo"];
		$sql = "UPDATE locar set dataFim = ? WHERE codigo = ?";
		$query = $pdo->prepare($sql);
		$query ->execute(array($hoje,$codigo));
		echo "<div align='center'><h1>Locação finalizada com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else{
		echo "<div align='center'><h1>Nada acontece!</h1></div>";
		echo "<script> window.location='index.php';</script>";
	}
	$pdo = null;
	
?>