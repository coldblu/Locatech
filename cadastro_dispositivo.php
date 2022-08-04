<?php
	session_start();
?>
<html>
<head>
	<title>Cadastrar Dispositivo</title>
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
				echo"<script>alert('Acesso negado!'); </script>";
				echo"<script> window.location='index.php';</script>";
			}
		?>
	</div>
	<div >
		<?php
            if($_SESSION["TipoUsuario"]==0){
				echo "<div class='' >";
					echo "<h1>Cadastro de dispositovo</h1>";
					if($_GET["act"]=="CadSmartphone"){
						echo "<div class='Formulario2'>";
							echo "<form action='inserir.php?act=CadAparelho' method='post'>";
									echo "<div><input type='hidden' type='number' id='tipo' name='tipo' value='1' required></td>";//Valor 1 - Representa tipo Smartphone
									echo "<div class=''>Modelo: </div>";//SELECT
									echo "<div >";
										echo "<select id='modelo' name='modelo' required>";
											echo "<option value='iPhone'> iPhone </option>";
											echo "<option value='iPhone 3G'> iPhone 3G </option>";
											echo "<option value='iPhone 3GS'> iPhone 3GS </option>";
											echo "<option value='iPhone 4'> iPhone 4 </option>";
											echo "<option value='iPhone 4S'> iPhone 4S  </option>";
											echo "<option value='iPhone 5'> iPhone 5 </option>";
											echo "<option value='iPhone 5C'> iPhone 5C </option>";
											echo "<option value='iPhone 5S'> iPhone 5S </option>";
											echo "<option value='iPhone 6'> iPhone 6  </option>";
											echo "<option value='iPhone 6 Plus'> iPhone 6 Plus</option>";
											echo "<option value='iPhone 6S'> iPhone 6S </option>";
											echo "<option value='iPhone 6S Plus'> iPhone 6S Plus</option>";
											echo "<option value='iPhone SE'> iPhone SE </option>";
											echo "<option value='iPhone 7'> iPhone 7 </option>";
											echo "<option value='iPhone 7 Plus'> iPhone 7 Plus </option>";
											echo "<option value='iPhone 8'> iPhone 8 </option>";
											echo "<option value='iPhone 8 Plus'> iPhone 8 Plus </option>";
											echo "<option value='iPhone X'> iPhone X </option>";
											echo "<option value='iPhone XR'> iPhone XR </option>";
											echo "<option value='iPhone XS'> iPhone XS </option>";
											echo "<option value='iPhone XS Max'> iPhone XS Max </option>";
											echo "<option value='iPhone 11'> iPhone 11</option>";
											echo "<option value='iPhone 11 Pro'> iPhone 11 Pro </option>";
											echo "<option value='iPhone 11 Pro Max'> iPhone 11 Pro Max </option>";
											echo "<option value='iPhone SE'> iPhone SE </option>";
											echo "<option value='iPhone 12'> iPhone 12 </option>";
											echo "<option value='iPhone 12 Mini'> iPhone 12 Mini </option>";
											echo "<option value='iPhone 12 Pro'> iPhone 12 Pro </option>";
											echo "<option value='iPhone 12 Pro Max'> iPhone 12 Pro Max </option>";
											echo "<option value='iPhone 13'> iPhone 13 </option>";
											echo "<option value='iPhone 13 Mini'> iPhone 13 Mini </option>";
											echo "<option value='iPhone 13 Pro'> iPhone 13 Pro </option>";
											echo "<option value='iPhone 13 Pro Max'> iPhone 13 Pro Max </option>";
											echo "<option value='iPhone SE'> iPhone SE </option>";
											
										echo "</select>";
									echo "</div>";
									echo "<div class=''>Estado de Conservação: </div>";//SELECT
									echo "<div >";
										echo "<select id='estado' name='estado' required>";
											echo "<option value='1'> 1 </option>";
											echo "<option value='2'> 2 </option>";
											echo "<option value='3'> 3 </option>";
											echo "<option value='4'> 4 </option>";
											echo "<option value='5'> 5 </option>";
										echo "</select>";
									echo "</div>";
									echo "<div class=''>Preço(R$): </div>";
									echo "<div ><input class='' type='text' name='preco' maxlength='10' required></div>";
									echo "<div class=''>Especificação:: </div>";//TEXTFIELD
									echo "<div ><textarea cols='40' rows='5' id='especificacao' name='especificacao' maxlength='200' required></textarea></div>";
									echo "<input class='buttons' type='submit' value='Cadastrar'>";
							echo "</form>";
						echo "</div>";
					}
					else if($_GET["act"]=="CadMacbook"){
						echo "<div class='Formulario2'>";
							echo "<form action='inserir.php?act=CadAparelho' method='post'>";
								echo "<div><input type='hidden' type='number' id='tipo' name='tipo' value='2' required></div>";//Valor 2 - Representa tipo Macbook
								echo "<div class=''>Modelo: </div>";//SELECT
								echo "<div >";
									echo "<select id='modelo' name='modelo' required>";
										echo "<option value='MacBook'> MacBook </option>";
										echo "<option value='MacBook Air'> MacBook Air </option>";
										echo "<option value='MacBook Pro'> MacBook Pro </option>";			
									echo "</select>";
								echo "<div class=''>Estado de Conservação: </div>";//SELECT
								echo "<div >";
									echo "<select id='estado' name='estado' required>";
										echo "<option value='1'> 1 </option>";
										echo "<option value='2'> 2 </option>";
										echo "<option value='3'> 3 </option>";
										echo "<option value='4'> 4 </option>";
										echo "<option value='5'> 5 </option>";
									echo "</select>";
								echo "</div>";
								echo "<div class=''>Preço(R$): </div>";
								echo "<div ><input class='' type='text' name='preco' maxlength='10' required></div>";
								echo "<div class=''>Especificação: </div>";//TEXTFIELD
								echo "<div ><textarea cols='40' rows='5' id='especificacao' name='especificacao' maxlength='200' required></textarea></div>";
								echo "<input class='buttons' type='submit' value='Cadastrar'>";
							echo "</form>";
						echo "</div>";
				echo "</div>";
				
				}
				else{
					echo"<script> window.location='painelDoUsuario.php';</script>";
				}
				
                
            }
            else{
				echo"<script> window.location='painelDoUsuario.php';</script>";
            }
        ?>
    </div>
</body>
</html>