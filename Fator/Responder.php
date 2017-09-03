<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Responder</title>
	</head>
	<body>
		<center>
			<h1>Responder questão</h1>

			<?php

				$Pergunta = $_POST['Pergunta'];
				$Resposta = $_POST['Escolha'];
				$Ano = $_POST['Ano'];
				$Materia = $_POST['Materia'];

				$Usuario = $_COOKIE['login'];
				    if(isset($Usuario)){
				      echo"Bem-Vindo, $Usuario<br>";
				    }

				$sql = "SELECT Pontos FROM Questao WHERE Pergunta = '$Pergunta' AND Resposta = '$Resposta'";

				$conexao = mysqli_connect("localhost","root","root","Fator");

				if (!$conexao)
					die("<br/>Conexao falhou: " . mysqli_connect_error());

				$resultado = mysqli_query($conexao, $sql);

				if (mysqli_num_rows($resultado) == 0){
					
				}else{
					$Pontos = mysqli_fetch_assoc($resultado);
					$sql = "UPDATE Usuario SET Pontuacao = ".$Pontos['Pontos']." WHERE Username = '$Usuario'";
					$resultado = mysqli_query($conexao, $sql);
				}

				$sql = "SELECT Resposta FROM Questao WHERE Pergunta = '$Pergunta'";
				$resultado = mysqli_query($conexao, $sql);

				$Resposta_Real = mysqli_fetch_assoc($resultado);
				$RespostaCorreta = $Resposta_Real['Resposta'];

				$sql = "INSERT INTO Estado VALUES('$Usuario','$Pergunta',1,'$Resposta')";
				$resultado = mysqli_query($conexao, $sql);

				if(!$resultado){
					die("<p style=\"color:red\">Erro!</p>");
				}

				print("<form id=\"Formulario\" action=\"Respondido.php\" method=\"POST\">");
				print("<input name=\"Ano\" type=\"hidden\" id=\"seu_campo\" value=\"$Ano\"/>");
				print("<input name=\"Materia\" type=\"hidden\" id=\"seu_campo\" value=\"$Materia\"/>");
				print("<input name=\"Pergunta\" type=\"hidden\" id=\"seu_campo\" value=\"$Pergunta\"/>");
				print("<input name=\"Resposta\" type=\"hidden\" id=\"seu_campo\" value=\"$Resposta\"/>");
				print("<input name=\"Resposta_Real\" type=\"hidden\" id=\"seu_campo\" value=\"$RespostaCorreta\"/>");
				print("<input name=\"Respondido\" type=\"hidden\" id=\"seu_campo\" value=\"1\"/>");
				print("</form>");

				

				mysqli_close($conexao);

			?>
		</center>

		<script type="text/javascript">	
			var theForm = document.getElementById('Formulario');
			theForm.submit();
		</script>
		</script>

	</body>
</html>