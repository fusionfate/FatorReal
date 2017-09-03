<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Procurar Usuários</title>

	</head>
	<body>

		<center>
			<h1>Digite o nome do Usuário:</h1>
			<form name="Procurar" method="GET">
				<input id="Texto" type="text" name="Procura"/><br/><br/>
				<input type="submit" name=""/>
			</form>
			<br/>
			<a href="Logado.php">Voltar a página inicial</a>
		</center>

		<center>

			<?php

				if(count($_GET) > 0){
					$sql = "SELECT Username FROM Usuario WHERE Username LIKE '" . $_GET['Procura'] . "%'";

					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("Conexao falhou: " . mysqli_connect_error());

					$resultado = mysqli_query($conexao, $sql);

					if (mysqli_num_rows($resultado) == 0)
						print "<h3>Nenhum usuário encontrado!</h3>";
					
					while ($linha = mysqli_fetch_assoc($resultado)){
						print "<h2> Resultados da pesquisa: <h2>";
						print "<h3>" . $linha['Username'] . "</h3>";
					}

					mysqli_close($conexao);
				}

			?>

		</center>
		
	</body>
</html>