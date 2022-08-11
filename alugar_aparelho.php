<?php
	session_start();
?>
<html>
<head>
	<title>Alugar Aparelho</title>
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
				echo"<ul align='right'>";				
				echo"<li>Usuario:  <a href='painelDoUsuario.php'> ".$_SESSION["Login"]."</a></li>";
				echo"<li><a href='validacao.php?act=logout'>Desconectar</a></li>";
				echo"</ul>";
			}
			else{
				echo"<script>alert('Faça o login primeiro!'); </script>";
				echo"<script> window.location='login.php';</script>";
			}
		?>
	</div>
	<div >
		<?php
            if($_SESSION["TipoUsuario"]==1){
				date_default_timezone_set('America/Sao_Paulo');
				$id = $_POST['id'];
				$hoje = date("Y-m-d");
				echo "<form action='inserir.php?act=LocaAparelho' method='post'>";
					echo "<div class=''>Forma de Pagamento: </div>";
						echo "<div >";
							echo "<select id='pagamento' name='pagamento' required>";
								echo "<option value='Avista'> Avista </option>";
								echo "<option value='Debito'> Debito </option>";
								echo "<option value='Credito'> Credito </option>";			
							echo "</select>";
						echo "</div>";	
					echo "<div class=''>Plano: </div>";//Select
					echo "<div >";
							echo "<select id='plano' name='plano' required>";
								echo "<option value='1'> 6 meses </option>";
								echo "<option value='2'> 12 meses </option>";
								echo "<option value='3'> 24 meses </option>";			
							echo "</select>";
						echo "</div>";
					echo "<div class=''>Data de Inicio da locação: </div>";
					echo "<div ><input class='' type='date' name='date' value='".$hoje."' required></div>";
					echo "<div><input type='hidden' type='number' id='id' name='id' value='".$id."' required></td>";
					
					echo "<input class='buttons' type='submit' value='Alugar'>";
				echo "</form>";
            }
            else{
				echo"<script> window.location='painelDoUsuario.php';</script>";
            }
        ?>
    </div>
</body>
</html>