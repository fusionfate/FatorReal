	<?php
		include("Includes/Conexao.php");
		session_start();
		if (isset($_SESSION['username'])){
			header("location:index.php");
		}
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title> Login - FatorReal </title>
		</head>
		<body>
			<form action="login.php" method="post">
				<label> Usuário: </label>
				<input type="text" name="username" placeholder="Digite o seu username" required="" /> <br/>
				<label> Senha: </label>
				<input type="password" name="senha" placeholder="Digite a senha" required=""/> <br/>
				<input type="submit" name="submit" value="Entrar"/>
			</form>
			<a href="cadastro.php"><p>Não possui uma conta? Venha para o Fator Real!</p></a>
		<?php
			if (isset($_POST['username'])){
				$username = $_POST['username'];
				$senha = $_POST['senha'];

				$verificar = mysqli_query($conexao,"SELECT * FROM usuario WHERE username = '$username' AND senha = '$senha'");

				if (mysqli_num_rows($verificar) > 0){
					$_SESSION['username'] = $username;
					header("location:index.php");
				}else{
					echo "Usuario não cadastrado";
				}
			}
		?>
		<?php include("Includes/Rodape.php");
