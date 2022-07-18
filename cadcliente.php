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
    <div class=""><!--Menu top -->
		<?php
			if(isset($_SESSION["ConectedLT"])){
				echo"<ul align='right'>";				
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
            if($_SESSION["TipoUsuario"]==1){
                echo "<h1>Adicionar dados Pessoais</h1>";
                $pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $pdo->prepare("select * from client where usuario_id=".$_SESSION['IdUsuario'].";");
                //Formulario
                echo "<form action='inserir.php?act=CadClient' method='post'>";
                    echo "<div class=''>CPF: </div>";
					echo "<div ><input class='' type='text' name='cpf' maxlength='11' required></div>";
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
            else{
                echo "<h1>Logado como Administrador!</h1>";
            }
        ?>
    </div>
</body>
</html>