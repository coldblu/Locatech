<?php
	session_start();
?>
<html>
<head>
	<title>Painel do Usuario</title>
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
				$consulta = $pdo->prepare("select * from client where usuario_id=".$_SESSION['IdUsuario'].";");
                $sql = "select * from client where usuario_id=".$_SESSION['IdUsuario'].";";
                $consulta->execute();
                $check = $consulta->fetch(PDO::FETCH_ASSOC);
				echo "<div class='Painel'>";
				echo "<h1 align='center' >Painel do usuário</h1>";
					if(isset($check["cpf"])){ 
						$_SESSION["cpf"] = $check["cpf"];
						echo "<div >";
							echo "<h2 align='center'>Dados cadastrais</h2>";
							echo "<table class=''>";                   
							foreach($pdo->query($sql) as $row )
								{
									echo "<tr>";
										echo "<td class=''><b>Nome</b>: </td>";
										echo "<td class=''>".$row["nome"]."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td class=''><b>CPF: </b></td>";
										echo "<td class=''>".$row["cpf"]."</td>";	
									echo "</tr>";
									echo "<tr>";
										echo "<td class=''><b>Endereco </b></td>";
										echo "<td class=''>".$row["endereco"]."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td class=''><b>nascimento </b></td>";
										echo "<td class=''>".$row["nascimento"]."</td>";
									echo "</tr>";
								}
							echo "</table>";
						echo "</div>";
						
						echo "<div >";
							echo "<h2 align='center'>Menu de opções</h2>";
							echo "<ul>";
								echo "<li class='buttons2'><a href='listar.php?act=EmpAtivos'>Emprestimos ativos</a></li>";
								echo "<li class='buttons2'><a href='listar.php?act=EmpFinalizados'>Histórico de emprestimos</a></li>";
							echo "</ul>";
						echo "</div>";
					}
					else{
						echo "<h2 align='center'>Adicionar dados Pessoais</h2>";
						//Formulario
						echo "<form action='inserir.php?act=CadClient' method='post'>";
							echo "<div class=''>CPF: </div>";
							echo "<div ><input class='' type='number' name='cpf' maxlength='11' required></div>";
							echo "<div class=''>Nome completo: </div>";
							echo "<div ><input class='' type='text' name='nome' maxlength='45' required></div>";
							echo "<div class=''>Endereço: </div>";
							echo "<div ><input class='' type='text' name='endereco' maxlength='45' required></div>";
							echo "<div class=''>Data de Nascimento: </div>";
							echo "<div ><input class='' type='date' name='data' maxlength='45' required></div>";
							echo "<div><input type='hidden' type='number' id='id' name='id' value='".$_SESSION['IdUsuario']."' required></td>";
							echo "<input class='buttons' type='submit' value='Cadastrar'>";
						echo "</form>";
		
					}
                echo "</div>";
            }
            else{
				echo "<div class='Painel' >";
					echo "<h1>Logado como Administrador!</h1>";
					echo "<div class=''>";
						echo "<ul>";
							echo "<li class='buttons2'><a href='cadastro_dispositivo.php?act=CadSmartphone'>Cadastrar Smarthphone</a></li>";
							echo "<li class='buttons2'><a href='cadastro_dispositivo.php?act=CadMacbook'>Cadastrar Macbook</a></li>";
							echo "<li class='buttons2'><a href='listar.php?act=Locados'>Aparelhos locados</a></li>";
							echo "<li class='buttons2'><a href='listar.php?act=IPhone'>Iphones Cadastrados</a></li>";
							echo "<li class='buttons2'><a href='listar.php?act=MacBook'>MacBooks Cadastrados</a></li>";
						echo "</ul>";							
					echo "</div>";
				echo "</div>";

            }
        ?>
    </div>
</body>
</html>