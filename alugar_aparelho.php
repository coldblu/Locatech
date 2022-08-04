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
                $pdo = new PDO('mysql:host=localhost;dbname=locatech;charset=utf8', "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $pdo->prepare("select * from aparelho inner join imei;");
                $sql = "select * from client where usuario_id=".$_SESSION['IdUsuario'].";";
                $consulta->execute();
                $check = $consulta->fetch(PDO::FETCH_ASSOC);
				echo "<div class='Painel'>";
				echo "<h1 align='center' >Alugar aparelho</h1>";
					if($_GET["act"]=="Smartphone"){
						$consulta = $pdo->prepare("select * from aparelho inner join imei where ;");
						$consulta->execute();
						$check = $consulta->fetch(PDO::FETCH_ASSOC);
					}
					else if($_GET["act"]=="MacBook"){
						
					}
                echo "</div>";
            }
            else{
				echo"<script> window.location='painelDoUsuario.php';</script>";
            }
        ?>
    </div>
</body>
</html>