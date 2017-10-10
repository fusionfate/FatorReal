
<?php
	echo "Bem vindo " . $Usuario;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?= TITULO_PAGINA ?> | FatorReal</title>
		<meta charset="utf8"/>
	</head>
	<body>
		<center>
			<nav id="menu">
				<ul>	
					<li><a href="index.php">Página Inicial</a></li>
					<li><a href="perfil.php">Perfil</a></li>
					<li><a href="#">Conteúdo</a>
						<ul id="drop">
							<li><a href="#">1° Ano</a></li>
							<li><a href="#">2° Ano</a></li>
							<li><a href="#">3° Ano</a></li>
						</ul>
					</li>
					<li><a href="jogar.php?ano=1">Questões</a></li>	
					<li><a href="deslogar.php">Sair</a></li>	
				</ul>
			</nav>
		</center>