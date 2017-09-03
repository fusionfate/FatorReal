<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>

		<style type="text/css">
			#BotaoLogin{
				width: 10%;
				height: 30px;
				border-radius: 10px;
				background: #5cb6c4;
				text-decoration: none;
				color: black;
				cursor: pointer;
				box-shadow: 3px 3px 0px 0px #4c4c4c;
				border: 1px gray solid;
			}

			input[type=text],[type=password]{
				width: 30%;
				text-align: center;
				border:0px black solid;
				border-bottom: 2px black solid;
				height: 30px;
			}

			h1{
				color:#478389;
			}

			p{
				color: #529299;
			}
			body{
				background-color: #478389;
			}
			#Div_Formulario{
				border-style: inset;
				border-radius: 7px;
				width: 40%;
				border:5px #3a3a3a solid;
				background-color: white;
			}
		</style>

		<center><br/><br/><br/>
			<div id="Div_Formulario"><br/>
				<h1>Login</h1>
				<form action="Login.php" method="POST">
					<p>Usuário:</p>
					<input required placeholder="Nome de usuário" type="text" name="Usuario"/>
					<p>Senha:</p>
					<input required placeholder="Senha" type="password" name="Senha"/><br/><br/><br/>
					<input id="BotaoLogin" type="submit" name="" value="Login"/>
				</form><br/>

				<?php
					if(count($_POST) > 0){

						$Username = $_POST['Usuario'];
						$Senha = $_POST['Senha'];
						
						$conexao = mysqli_connect("localhost","root","root","Fator");

						if (!$conexao)
							die("Conexao falhou: " . mysqli_connect_error());

						$verificar = "SELECT * FROM Usuario WHERE Username = '$Username' AND Senha = '$Senha'";

						$resultado = mysqli_query($conexao, $verificar);

						if (mysqli_num_rows($resultado) == 0)
							die("<p style=\"color:red\">Usuário ou senha incorretos!</p><br/>");

						if (mysqli_num_rows($resultado) == 1)
							setcookie("login",$Username);
							header('location:Logado.php');

						mysqli_close($conexao);
					}
				?>
				<br/><br/><br/><br/>
			</div>
		</center>

		<center>
			
			
		</center>

	</body>
</html>