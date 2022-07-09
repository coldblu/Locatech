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
	<!--<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/> -->
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
                echo "<h1>Logado como cliente!</h1>";
                $pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $pdo->prepare("select * from client where usuario_id=".$_SESSION['IdUsuario'].";");
                $sql = "select * from client where usuario_id=".$_SESSION['IdUsuario'].";";
                $consulta->execute();
                $check = $consulta->fetch(PDO::FETCH_ASSOC);
                if($check["cpf"] != ' '){                    
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
                }
                else{
                    echo"<li><a href='cadcliente.php'>Adicionar dados pessoais</a></li>";
                }
                    
            }
            else{
                echo "<h1>Logado como Administrador!</h1>";

            }
        ?>
    </div>
</body>
</html>