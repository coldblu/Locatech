<?php
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
	if($_GET["act"]=="RemoveMacBook"){
		$id = $_POST["id"];
		$sql = "delete from aparelho where id = ?";		
		$query = $pdo->prepare($sql);
		$query->execute(array($id));
		echo "<div align='center'><h1>Aparelho removido com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else if($_GET["act"]=="RemoveIPhone"){
		if(isset($_POST["imei"]){
			$imei = $_POST["imei"];
			$sql = "delete from iphone where imei = ?";		
			$query = $pdo->prepare($sql);
			$query->execute(array($imei));
		}
		$id = $_POST["id"];
		$sql = "delete from aparelho where id = ?";		
		$query = $pdo->prepare($sql);
		$query->execute(array($id));
		echo "<div align='center'><h1>Aparelho removido com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else{
		echo "<div align='center'><h1>Nada acontece!</h1></div>";
		echo "<script> window.location='index.php';</script>";
	}
	$pdo = null;
	
?>