<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Jogar</title>
		<link rel="stylesheet" type="text/css" href="Menu.css">
	</head>

	<style type="text/css">
		
	</style>

	<body>

		<style type="text/css">
			#Botao{
				width: 10%;
				height: 30px;
				border-radius: 10px;
				background: #5cb6c4;
				text-decoration: none;
				color: black;
				cursor: pointer;
			}
		</style>

		<div class="barra">
			<?php
				$Usuario = $_COOKIE['login'];
				print("<h3 id=\"Usuario\">Bem vindo(a) $Usuario</h3>");
			?>
			</div>
			<nav id="menu">
				<ul>	
						<li><a href="Logado.php">Página Inicial</a></li>
						<li><a href="#">Perfil</a></li>
						<li><a href="#">Conteúdo</a>
							<ul id="drop">
								<li><a href="#">1° Ano</a></li>
								<li><a href="#">2° Ano</a></li>
								<li><a href="#">3° Ano</a></li>
							</ul>
						</li>
						<li><a href="Jogar.php">Questões</a></li>	
						<li><a href="index.html">Sair</a></li>	
					</ul>
			</nav>
		<br/><br/><br/><br/>

		<center>

			<h2>Jogar</h2>

			<form action="" method="POST">
				<h3>Selecione o ano:</h3>
				<h4> <input type="radio" value="1" name="Ano">  Primeiro Ano <br/>
				<h4> <input type="radio" value="2" name="Ano"> Segundo Ano <br/>
				<h4> <input type="radio" value="3" name="Ano"> Terceiro Ano <br/><br/>
				<input type="submit" name="" id="Botao" value="Escolher">
			</form>

			<?php
				if(count($_POST) > 0){

					$Ano = $_POST['Ano'];
					$sql = "SELECT DISTINCT(Materia) FROM Questao where Ano = $Ano";
					
					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("<br/>Erro de conexão!" . mysqli_connect_error());
						

					$resultado = mysqli_query($conexao, $sql);

					if (mysqli_num_rows($resultado) == 0)
						die("<br/><br/>Nenhuma matéria encontrada!");

					print("<br/><br/>Selecione a matéria:");
					print("<form action=\"Iniciar.php\" method=\"POST\"> ");
					print("<input name=\"Ano\" type=\"hidden\" id=\"seu_campo\" value=\"$Ano\"/>");

					while ($Materia = mysqli_fetch_assoc($resultado)){
						print("<h4><input type=\"radio\" value=\"".$Materia['Materia']."\" name=\"Materia\"> ".$Materia['Materia']."<br/>");
					}
					print("<br/><br/><input type=\"submit\" id=\"Botao\" value=\"Jogar\">");
					print("</form>");

					mysqli_close($conexao);
				}
			?>
		</center>
	</body>
</html>