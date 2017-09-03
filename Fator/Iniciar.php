<!DOCTYPE html>
<html>
	<head>

		<title>Jogar</title>
		<link rel="stylesheet" type="text/css" href="Menu.css">
		<meta charset="utf-8">
		<script type="text/javascript">
			function Proximo(){
				var theForm = document.getElementById('Formulario');
				theForm.submit();
			}
		</script>

	</head>

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
				line-height:30px;
				border:2px #5b5858 solid;
			}
		</style>

		<center>

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

			<h1>Jogar</h1>

			<?php
					$conexao = mysqli_connect("localhost","root","root","Fator");

					$Usuario = $_COOKIE['login'];
				    $Ano = $_POST['Ano'];
					$Materia = $_POST['Materia'];
					
					if (!$conexao)
						die("<br/>Conexao falhou: " . mysqli_connect_error());

					$ObterQuestao = "SELECT * FROM Questao WHERE Ano = $Ano AND Materia = '$Materia'";
					$ObterEstado = "SELECT * FROM Estado WHERE Usuario_Username = '$Usuario'";

					$Questoes = mysqli_query($conexao, $ObterQuestao);
					$Estados = mysqli_query($conexao, $ObterEstado);

					print("<br/><h3>Matéria atual: ".$Materia."</h3>");

					print("<form id=\"Formulario\" action=\"Responder.php\" method=\"POST\">");

					while ($linha = mysqli_fetch_assoc($Questoes)){

						$Verificar = "SELECT Questao_Pergunta FROM Estado WHERE Usuario_Username = '$Usuario' and Questao_Pergunta = '".$linha['Pergunta']."'";
						$Resultado = mysqli_query($conexao, $Verificar);
						if(!$Resultado){
							die("Erro!");
						}

						if(mysqli_num_rows($Resultado) == 0){
								print("<br/><input name=\"Pergunta\" type=\"hidden\" id=\"seu_campo\" value=\"".$linha['Pergunta']."\"/>".$linha['Pergunta']);
								print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa1\">  ".$linha['Alternativa1']);
								print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa2\">  ".$linha['Alternativa2']);
								print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa3\">  ".$linha['Alternativa3']);
								print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa4\">  ".$linha['Alternativa4']);
								print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa5\">  ".$linha['Alternativa5']);
								print("<input name=\"Ano\" type=\"hidden\" id=\"seu_campo\" value=\"$Ano\"/>");
								print("<input name=\"Materia\" type=\"hidden\" id=\"seu_campo\" value=\"$Materia\"/>");
								print("<br/><br/><input onclick=\"Proximo()\" value=\"Avançar\" type=\"submit\"><br/>");
								die();	
						}else{
							while ($linha3 = mysqli_fetch_assoc($Resultado)){
								if($linha3['Questao_Pergunta'] == $linha['Pergunta']){
									
								}else{
									print("<br/><input name=\"Pergunta\" type=\"hidden\" id=\"seu_campo\" value=\"".$linha['Pergunta']."\"/>".$linha['Pergunta']);
									print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa1\">  ".$linha['Alternativa1']);
									print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa2\">  ".$linha['Alternativa2']);
									print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa3\">  ".$linha['Alternativa3']);
									print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa4\">  ".$linha['Alternativa4']);
									print("<br/><br/><input type=\"radio\" name=\"Escolha\" value=\"Alternativa5\">  ".$linha['Alternativa5']);
									print("<br/><br/><p> Valendo ".$linha['Pontos']." pontos.");
									print("<input name=\"Ano\" type=\"hidden\" id=\"seu_campo\" value=\"$Ano\"/>");
									print("<input name=\"Materia\" type=\"hidden\" id=\"seu_campo\" value=\"$Materia\"/>");
									print("<br/><br/><input onclick=\"Proximo()\" value=\"Avançar\" type=\"submit\"><br/>");
									die();	
								}
							}
						}
					}

					print("<h3>Todas as questões já foram respondidas!</h3>");

					mysqli_close($conexao);
				
			?>
		</center>
	</body>
</html>