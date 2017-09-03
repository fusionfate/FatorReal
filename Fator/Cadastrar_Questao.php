<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastrar Questão</title>
	</head>
	<body>
		<center>
			<h1>Cadastro de questão</h1>

			<form action="" method="POST">

				<p>Ano:</p>
				<input type="number" required max="3" min="1" value="" name="Ano"> <br/><br/>
				<p>Matéria:</p>
				<input type="text" required value="" name="Materia"><br/><br/>
				<p>Pergunta:</p>
				<textarea rows="3" required name="Pergunta"></textarea>
				<p>Alternativa 1:</p>
				<textarea required name="Alternativa1"></textarea>
				<p>Alternativa 2:</p>
				<textarea required name="Alternativa2"></textarea>
				<p>Alternativa 3:</p>
				<textarea required name="Alternativa3"></textarea>
				<p>Alternativa 4:</p>
				<textarea required name="Alternativa4"></textarea>
				<p>Alternativa 5:</p>
				<textarea required name="Alternativa5"></textarea>
				<p>Resposta:</p>
				<p><input required type="radio" value="Alternativa1" name="Resposta">Alternativa 1</p>
				<p><input required type="radio" value="Alternativa2" name="Resposta">Alternativa 2</p>
				<p><input required type="radio" value="Alternativa3" name="Resposta">Alternativa 3</p>
				<p><input required type="radio" value="Alternativa4" name="Resposta">Alternativa 4</p>
				<p><input required type="radio" value="Alternativa5" name="Resposta">Alternativa 5</p>
				<p>Pontos:</p>
				<input required type="number" max="" min="1" value="" name="Pontos"> <br/><br/>
				<input type="submit" name="" value="Cadastrar">
				<br/><br/><br/><br/>
			</form>

			<?php
				if(count($_POST) > 0){

					$Ano = $_POST['Ano'];
					$Materia = $_POST['Materia'];
					$Pergunta = $_POST['Pergunta'];
					$Alternativa1 = $_POST['Alternativa1'];
					$Alternativa2 = $_POST['Alternativa2'];
					$Alternativa3 = $_POST['Alternativa3'];
					$Alternativa4 = $_POST['Alternativa4'];
					$Alternativa5 = $_POST['Alternativa5'];
					$Resposta = $_POST['Resposta'];
					$Pontos = $_POST['Pontos'];

					$sql = "INSERT INTO Questao VALUES($Ano,'$Materia','$Pergunta','$Alternativa1','$Alternativa2','$Alternativa3','$Alternativa4','$Alternativa5','$Resposta',$Pontos)";
					
					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("<br/>Erro de conexão!" . mysqli_connect_error());
						

					$resultado = mysqli_query($conexao, $sql);

					if($resultado){
						print("<br/><p style=\"color:green\"> Questão cadastrada com sucesso! </p>");
					}else{
						print("<br/><p style=\"color:red\"> Questão já cadastrada! </p>");
					}

					print("<a href=\"Logado.php\">Voltar à página principal</a>");

					mysqli_close($conexao);
				}
			?>

		</center>
	</body>
</html>