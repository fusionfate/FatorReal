<!DOCTYPE html>
<html>
	<head>

		<title>Jogar</title>
		<meta charset="utf-8">
		<script type="text/javascript">
			function Proximo(){
				var theForm = document.getElementById('Formulario');
				theForm.submit();
			}
		</script>
	</head>

	<body>
		<center>
			<h1>Jogar</h1>

			<?php
					$conexao = mysqli_connect("localhost","root","root","Fator");

					$Usuario = $_COOKIE['login'];
				    if(isset($Usuario)){
				      echo"Bem-Vindo, $Usuario <br>";
				    }

				    if(isset($_POST['Respondido'])){
				    	$Ano = $_POST['Ano'];
				    	$Materia = $_POST['Materia'];
				    	$Respondido = $_POST['Respondido'];
				    	$Pergunta = $_POST['Pergunta'];
				    	$Resposta = $_POST['Resposta'];
				    	$Resposta_Real = $_POST['Resposta_Real'];
				    	$ObterQuestao = "SELECT * FROM Questao WHERE Ano = $Ano AND Materia = '$Materia' AND Pergunta = '$Pergunta'";
				    	$Questoes = mysqli_query($conexao, $ObterQuestao);
				    	while ($linha = mysqli_fetch_assoc($Questoes)){
					    	print("<form action=\"Iniciar.php\" method=\"POST\"");
					    	print("<br/><input name=\"Pergunta\" type=\"hidden\" id=\"seu_campo\" value=\"".$linha['Pergunta']."\"/>Pergunta: ".$linha['Pergunta']);
							print("<br/><br/>Alternativa 1: ".$linha['Alternativa1']);
							print("<br/><br/>Alternativa 2: ".$linha['Alternativa2']);
							print("<br/><br/>Alternativa 3: ".$linha['Alternativa3']);
							print("<br/><br/>Alternativa 4: ".$linha['Alternativa4']);
							print("<br/><br/>Alternativa 5: ".$linha['Alternativa5']);
							print("<input name=\"Ano\" type=\"hidden\" id=\"seu_campo\" value=\"$Ano\"/>");
							print("<input name=\"Materia\" type=\"hidden\" id=\"seu_campo\" value=\"$Materia\"/>");
							if($Resposta_Real == $Resposta){
								print("<p style=\"color:green\">Acerto!<br/><br/> Resposta: $Resposta_Real <br/><br/> Você ganhou ".$linha['Pontos']." pontos.</p>");
							}else{
								print("<p style=\"color:red\">Errado!<br/><br/> Resposta Certa: $Resposta_Real</p>");
								print("<p style=\"color:green\">Sua resposta: $Resposta</p>");
							}
							print("<br/><input onclick=\"Proximo()\" value=\"Avançar\" type=\"submit\"><br/>");
							print("</form>");
						}
				    }


					mysqli_close($conexao);
				
			?>
		</center>
	</body>
</html>