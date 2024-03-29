<?php //Verifica se o usuario esta logado
	session_start();
	if(isset($_SESSION["ConectedLT"])){
		//echo"<script> window.location='index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalhes do Produto</title>
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
				echo"<li><a class='buttons2' href='index.php' >Pagina Inicial</a></li>";
				echo"<li>Usuario:  <a href='painelDoUsuario.php'> ".$_SESSION["Login"]."</a></li>";
				echo"<li><a href='validacao.php?act=logout'>Desconectar</a></li>";
				echo"</ul>";
			}
			else{
				echo"<ul align='right'>";	
				echo"<li><a class='buttons2' href='index.php' >Pagina Inicial</a></li>";
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
			
		</ul>
		<!--
		<form class='SearchBar' action="#">
				<input type="text" placeholder="Produto..." name="search" maxlength="30">
				<button class='' type="submit">pesquisar</i></button>
		</form>
		-->
	</div>

		<div class='Conteudo'>
			<h2> Detalhes do Produto <h2>
			<?php
				date_default_timezone_set('America/Sao_Paulo');
				$id = $_POST['id'];
				$hoje = date("Y-m-d");
				$pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $pdo->prepare("select * from aparelho left join locar on  id=id_aparelho where id='".$id."';");
                $consulta->execute();
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);
				//-------------------
				echo "<div >";
					if($linha["tipo"] == 1){
						echo "<img src='images/default_iphone.jpg' />";
					}
					else if($linha["tipo"] == 2){
						echo "<img src='images/default_macbook.png' />";
					}					
				echo "</div>";
				echo "<table class='mytable'>";
					echo "<tr>";
						echo "<td class='mytd'>Modelo: </td>";
						echo "<td class='mytd'>".$linha["modelo"]." </td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td class='mytd'> Especificação: </td>";
						echo "<td class='mytd'>".$linha["especificacao"]." </td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td class='mytd'>Estado de conservação: </td>";
						echo "<td class='mytd'> ".$linha["conservacao"]." </td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td class='mytd'>Preço: </td>";
						echo "<td class='mytd'>".$linha["preco"]." </td>";
					echo "</tr>";
					
				echo "</table>";
				
				
				//-------------------
				
				//Validação se o produto está disponível
				$consulta2 = $pdo->prepare("select COUNT(dataInicio) from aparelho left join locar on  id = id_aparelho where id='".$id."';");
                $consulta2->execute();
                $checker = $consulta2->fetch(PDO::FETCH_ASSOC);
				//Verificar os produtos com locação finalizada
				$sql = "select * from aparelho left join locar on  id = id_aparelho where id='".$id."';";
				$checktwo = 0;
				foreach($pdo->query($sql) as $row){
				if(($row["dataInicio"] != NULL) && ($row["dataFim"] == NULL)){
						$checktwo++;
					}
				}
				if($checker == 0 || $checktwo == 0){
					echo "<form action='alugar_aparelho.php' method='post'>";
						echo "<input type='hidden' type='number' id='id' name='id' value='".$linha["id"]."' required>";
						echo "<input class='buttons' type='submit' value='Alugar'>";
					echo "</form>";
				}
				else{
					echo "<h3>Produto Indisponível!</h3>";
				}
				
			?>			
			
			
			
		</div>
</body>
</html>