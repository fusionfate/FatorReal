<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Colocar Pontos</title>
	</head>
	<body>

		<center>

			<?php
					$Ano = $_POST['Ano'];
					$Materia = $_POST['Materia'];
					$Questao = $_POST['Questao'];
					$Alternativa1 = $_POST['Alternativa1'];
					$Alternativa2 = $_POST['Alternativa2'];
					$Alternativa3 = $_POST['Alternativa3'];
					$Alternativa4 = $_POST['Alternativa4'];
					$Alternativa5 = $_POST['Alternativa5'];
					$Resposta = $_POST['Resposta'];

					if($Ano == "Primeiro"){
						$sql = "INSERT INTO PrimeiroAno VALUES(0,'$Materia','$Questao','$Alternativa1','$Alternativa2','$Alternativa3','$Alternativa4','$Alternativa5','$Resposta')";
					}else if($Ano == "Segundo"){
						$sql = "INSERT INTO SegundoAno VALUES(0,'$Materia','$Questao','$Alternativa1','$Alternativa2','$Alternativa3','$Alternativa4','$Alternativa5','$Resposta')";
					}else if($Ano == "Terceiro"){
						$sql = "INSERT INTO TerceiroAno VALUES(0,'$Materia','$Questao','$Alternativa1','$Alternativa2','$Alternativa3','$Alternativa4','$Alternativa5','$Resposta')";
					}
					
					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("<br/>Conexao falhou: " . mysqli_connect_error());

					$resultado = mysqli_query($conexao, $sql);	

					if($resultado){
						print("<br/>Questão cadastrada com sucesso!");
					}else{
						print("<br/Erro ao cadastrar questão! Verifique se algo está em branco!");
					}

					print("<br/><br/><a href=\"Logado.php\"> Voltar a página inicial </a>");

					mysqli_close($conexao);

			?>

		</center>
	</body>
</html>