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
	else if($_GET["act"]=="CadAparelho" && $_SESSION["TipoUsuario"]==0){
		$modelo = $_POST["modelo"];
		$preco =(float) $_POST["preco"];
		$especificacao = $_POST["especificacao"]; 
		$conservacao = $_POST["estado"];
		$tipo = $_POST["tipo"];
		//Insert
		$sql = "insert into aparelho (modelo, preco, especificacao, conservacao, tipo)  Values(?,?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($modelo,$preco,$especificacao,$conservacao,$tipo));
		echo "<div align='center'><h1>Cadastro de aparelho realizado com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else if($_GET["act"]=="CadIMEI" && $_SESSION["TipoUsuario"]==0){
		$imei = $_POST["imei"];
		$id = $_POST["id"];
		//Insert
		$sql = "insert into iphone (imei, aparelho_id)  Values(?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($imei,$id));
		echo "<div align='center'><h1>Cadastro do IMEI do aparelho realizado com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else if($_GET["act"]=="LocaAparelho" && $_SESSION["TipoUsuario"]==1){
		$idProduto = $_POST["id"];
		$dataInicio = $_POST["date"];
		$formaPagamento = $_POST["pagamento"];
		$plano = $_POST["plano"];
		$cpfUsuario = $_SESSION["cpf"];
		//Insert
		$sql = "insert into locar (formaPagament, dataInicio, plano, cpf_cliente , id_aparelho)  Values(?,?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($formaPagamento,$dataInicio,$plano,$cpfUsuario,$idProduto));
		echo "<div align='center'><h1>Locação feita com sucesso!</h1></div>";
		header( "refresh:3;url=painelDoUsuario.php" );
	}
	else{
		echo "<div align='center'><h1>Nada acontece!</h1></div>";
		echo "<script> window.location='index.php';</script>";
	}
	$pdo = null;
	
?>