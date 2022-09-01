<?php
	session_start();
?>
<html>
<head>
	<title>Infos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="author" content=""/>
	<meta name="description" content="Locatech - Sistema de locação de dispositivos IOS."/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/> <!--Meta tag responsiva -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>
</head>
<body>
    <div class="MenuContaTop"><!--Menu top -->
		<?php
			if(isset($_SESSION["ConectedLT"])){
				echo"<ul >";				
				
				echo"</ul>";
				
				
				echo"<ul align='right'>";	
				echo"<li><a class='buttons2' href='index.php' >Pagina Inicial</a></li>";				
				echo"<li>Usuario:  <a href='painelDoUsuario.php'> ".$_SESSION["Login"]."</a></li>";
				echo"<li><a href='validacao.php?act=logout'>Desconectar</a></li>";
				echo"</ul>";
			}
			else{
				echo"<script>alert('Acesso negado!'); </script>";
				echo"<script> window.location='index.php';</script>";
			}
		?>
	</div>
	<div >
		<?php
		$pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($_SESSION["TipoUsuario"]==1){
                echo "<div class='Painel' >";
				
				$consulta = $pdo->prepare("select * from client where usuario_id=".$_SESSION['IdUsuario'].";");
				$consulta->execute();
                $check = $consulta->fetch(PDO::FETCH_ASSOC);
				$cpfCliente = $check["cpf"];
					if($_GET["act"]=="EmpAtivos"){
						echo "<div >";
							echo "<h2 align='center'>Emprestimos Ativos</h2>";
							$sql = "select * from locar inner join aparelho where id_aparelho=id and cpf_cliente=".$cpfCliente.";";
							echo "<table class=''>";  
							echo "<tr>";
							echo "<th class='mytd'> Aparelho </th>";
							echo "<th class='mytd'> Data Inicio da locação </th>";
							echo "<th class='mytd'> Plano </th>";
							echo "<th class='mytd'> Preço </th>";
							echo "</tr>";
							foreach($pdo->query($sql) as $row )
								{
									if($row["dataFim"] == ''){
									echo "<tr>";
										echo "<td class='mytd'>".$row["modelo"]."</td>";
										echo "<td class='mytd'>".$row["dataInicio"]."</td>";
										echo "<td class='mytd'>".$row["plano"]."</td>";
										echo "<td class='mytd'>".$row["preco"]."</td>";
									echo "</tr>";
									}
								}
							echo "</table>";
						echo "</div>";
					}
					else if($_GET["act"]=="EmpFinalizados"){
						echo "<div >";
							echo "<h2 align='center'>Emprestimos Ativos</h2>";
							$sql = "select * from locar inner join aparelho where id_aparelho=id and cpf_cliente=".$cpfCliente.";";
							echo "<table class=''>";  
							echo "<tr>";
							echo "<th class='mytd'> Aparelho </th>";
							echo "<th class='mytd'> Data Inicio da locação </th>";
							echo "<th class='mytd'> Plano </th>";
							echo "<th class='mytd'> Preço </th>";
							echo "</tr>";
							foreach($pdo->query($sql) as $row )
								{
									if($row["dataFim"] != ''){
									echo "<tr>";
										echo "<td class='mytd'>".$row["modelo"]."</td>";
										echo "<td class='mytd'>".$row["dataInicio"]."</td>";
										echo "<td class='mytd'>".$row["plano"]."</td>";
										echo "<td class='mytd'>".$row["preco"]."</td>";
									echo "</tr>";
									}
								}
							echo "</table>";
						echo "</div>";
					}
				echo "</div>";
            }
            else{
				echo "<div class='Painel' >";
					if($_GET["act"]=="Locados"){
						echo "<div >";
							echo "<h2 align='center'>Emprestimos Ativos</h2>";
							$sql = "select * from locar inner join aparelho where id_aparelho=id ;";
							echo "<table class=''>";  
							echo "<tr>";
							echo "<th class='mytd'> Aparelho </th>";
							echo "<th class='mytd'> Data Inicio da locação </th>";
							echo "<th class='mytd'> Plano </th>";
							echo "<th class='mytd'> Preço </th>";
							echo "<th class='mytd' colspan='1'> Açoes </th>";
							echo "</tr>";
							foreach($pdo->query($sql) as $row)
								{
									if($row["dataFim"] == ''){
									echo "<tr>";
										echo "<td class='mytd'>".$row["modelo"]."</td>";
										echo "<td class='mytd'>".$row["dataInicio"]."</td>";
										echo "<td class='mytd'>".$row["plano"]."</td>";
										echo "<td class='mytd'>".$row["preco"]."</td>";
										//Atualizar
										echo "<form action='atualizar.php?act=Finalizar' method='post'>";
											echo "<input type='hidden' type='number' id='codigo' name='codigo' value='".$row["codigo"]."' >";
											echo "<td class='mytd' align='center'><input class='buttons' type='submit' value='Finalizar'></td>";	
										echo "</form>";
									echo "</tr>";
									}
								}
							echo "</table>";
						echo "</div>";
					}
					else if($_GET["act"]=="IPhone"){
						echo "<div >";
							echo "<h2 align='center'>Emprestimos Ativos</h2>";
							$sql = "select * from aparelho left join iphone on id=aparelho_id where tipo=1;";
							echo "<table class=''>";  
							echo "<tr>";
							echo "<th class='mytd'> Modelo </th>";
							echo "<th class='mytd'> Especificação</th>";
							echo "<th class='mytd'> Conservação </th>";
							echo "<th class='mytd'> Preço </th>";
							echo "<th class='mytd' colspan='2'> Açoes </th>";
							echo "</tr>";
							foreach($pdo->query($sql) as $row)
								{
									echo "<tr>";
										echo "<td class='mytd'>".$row["modelo"]."</td>";
										echo "<td class='mytd'>".$row["especificacao"]."</td>";
										echo "<td class='mytd'>".$row["conservacao"]."</td>";
										echo "<td class='mytd'>".$row["preco"]."</td>";
										//Atualizar
										if($row["imei"] == NULL){
										echo "<form action='atualizar.php?act=Finalizar' method='post'>";
											echo "<input type='hidden' type='number' id='id' name='id' value='".$row["id"]."' >";
											echo "<td class='mytd' align='center'><input class='buttons' type='submit' value='Cadastrar IMEI'></td>";	
										echo "</form>";
										}
										else{
											echo "<td class='mytd'>".$row["imei"]."</td>";
										}
										echo "<form action='deletar.php?act=RemoveIPhone' method='post'>";
											echo "<input type='hidden' type='number' id='id' name='id' value='".$row["id"]."' >";
											echo "<input type='hidden' type='number' id='imei' name='imei' value='".$row["imei"]."' >";
											echo "<td class='mytd' align='center'><input class='buttons' type='submit' value='Remover Aparelho'></td>";	
										echo "</form>";
										;
									echo "</tr>";
									
								}
							echo "</table>";
						echo "</div>";
					}
					else if($_GET["act"]=="MacBook"){
						echo "<div >";
							echo "<h2 align='center'>Emprestimos Ativos</h2>";
							$sql = "select * from aparelho where tipo=2;";
							echo "<table class=''>";  
							echo "<tr>";
							echo "<th class='mytd'> Modelo </th>";
							echo "<th class='mytd'> Especificação</th>";
							echo "<th class='mytd'> Conservação </th>";
							echo "<th class='mytd'> Preço </th>";
							echo "<th class='mytd' colspan='1'> Açoes </th>";
							echo "</tr>";
							foreach($pdo->query($sql) as $row)
								{
									
									echo "<tr>";
										echo "<td class='mytd'>".$row["modelo"]."</td>";
										echo "<td class='mytd'>".$row["especificacao"]."</td>";
										echo "<td class='mytd'>".$row["conservacao"]."</td>";
										echo "<td class='mytd'>".$row["preco"]."</td>";
										//Deletar
										echo "<form action='deletar.php?act=RemoveMacBook' method='post'>";
											echo "<input type='hidden' type='number' id='id' name='id' value='".$row["id"]."' >";
											echo "<td class='mytd' align='center'><input class='buttons' type='submit' value='Remover Aparelho'></td>";	
										echo "</form>";
										
									echo "</tr>";
									
								}
							echo "</table>";
						echo "</div>";
					}
				echo "</div>";

            }
        ?>
    </div>
</body>
</html>