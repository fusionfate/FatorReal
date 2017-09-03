<!DOCTYPE html>
	<html>
		<head>
			<title>Página Inicial</title>
			<link rel="stylesheet" type="text/css" href="Menu.css">
			<meta charset="utf-8">
		</head>
		
		<body>

			<style type="text/css">
				#Fundo{
					border: 1px white solid;
					background-color: white;
					border-radius: 10px;
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
		<br/>
		<center>

		<h1>Ranking</h1>

		<div class="rank">
			<h2>Os 5 Melhores !</h2><div id="Fundo"><br/>
				<?php

					$sql = "SELECT Username, Pontuacao FROM Usuario ORDER BY Pontuacao DESC";
					$i = 1;

					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("Conexao falhou: " . mysqli_connect_error());

					$resultado = mysqli_query($conexao, $sql);

					if (mysqli_num_rows($resultado) == 0)
						print "Nenhuma Potuação!";
					
					while ($linha = mysqli_fetch_assoc($resultado)){
						if ($i == 6) {
							break;
						}
						print "<h3>". $i . "º Lugar " . $linha['Username'] . " " . $linha['Pontuacao'] . "</h3>";
						$i++;
					}

					mysqli_close($conexao);
				?>
			</div>
		</div>

			<br/>

			<div class="rank">
				<h2>Sua Posição no Ranking</h2><div id="Fundo"><br/>
				<?php

					$sql = "SELECT Username, Pontuacao FROM Usuario ORDER BY Pontuacao DESC";
					$i = 1;

					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("Conexao falhou: " . mysqli_connect_error());

					$resultado = mysqli_query($conexao, $sql);

					if (mysqli_num_rows($resultado) == 0)
						print "Erro!";

					$Encontrou = 0;
					$Var = 1;
					
					while ($linha = mysqli_fetch_assoc($resultado)){
						if($linha['Username']  == $Usuario){
							$Posicao = $i;
						}	
						$i++;	
					}

					$resultado = mysqli_query($conexao, $sql);

					$i = 1;

					while ($linha = mysqli_fetch_assoc($resultado)){
						if($i == $Posicao-2 or $i == $Posicao-1 or $i == $Posicao or $i == $Posicao+1 or $i == $Posicao+2){
							if($i == $Posicao){
								print "<h3 style=\"color:green\">". $i . "º Lugar " . $linha['Username'] . " " . $linha['Pontuacao'] . "</h3>";
							}else{
								print "<h3>". $i . "º Lugar " . $linha['Username'] . " " . $linha['Pontuacao'] . "</h3>";
							}
						}	
						$i++;	
					}

					mysqli_close($conexao);
				?>
				</div>
			</div>
		</center>

		</body>
	</html>