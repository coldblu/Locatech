<?php
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
	if($_GET["act"]=="CadUsuario"){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		//Insert
		$sql = "insert into usuario (login, senha, tipo)  Values(?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($login,$senha,1));
		echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
		header( "refresh:3;url=login.php" );
	}
    else if($_GET["act"]=="CadClient"){
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];
		$data = $_POST['data'];
		$idUsuario = $_POST['id'];
		//Insert
		$sql = "insert into client (cpf, nome, endereco, nascimento, usuario_id)  Values(?,?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($cpf,$nome,$endereco,$data,$idUsuario));
		echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else if($_GET["act"]=="CadSmartphone" && $_SESSION["TipoUsuario"]==0){
		$modelo = $_POST["modelo"];
		$preco =(float) $_POST["preco"];
		$especificacao = $_POST["especificacao"]; 
		$conservacao = $_POST["estado"];
		//Insert
		$sql = "insert into aparelho (modelo, preco, especificacao, conservacao)  Values(?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($modelo,$preco,$especificacao,$conservacao));
		echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else if($_GET["act"]=="CadMacbook"  && $_SESSION["TipoUsuario"]==0){
		$modelo = $_POST["modelo"];
		$preco =(float) $_POST["preco"];
		$especificacao = $_POST["especificacao"]; 
		$conservacao = $_POST["estado"];
		//Insert
		$sql = "insert into aparelho (modelo, preco, especificacao, conservacao)  Values(?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($modelo,$preco,$especificacao,$conservacao));
		echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else{
		echo "<script> window.location='index.php';</script>";
	}
	$pdo = null;
	
?>