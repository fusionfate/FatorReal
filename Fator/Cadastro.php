<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastro</title>
	</head>
	<body>

		<script type="text/javascript">
			function Login(){
				window.location = "Login.php";
			}
		</script>

		
		<style type="text/css">

			#Botao,#BotaoLogin{
				width: 25%;
				height: 30px;
				border-radius: 10px;
				background: #5cb6c4;
				text-decoration: none;
				color: black;
				cursor: pointer;
				box-shadow: 3px 3px 0px 0px #4c4c4c;
				border: 1px gray solid;
				font-size: 17px;
			}

			#BotaoLogin{
				line-height: 30px;
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

			form{
				font-family: sans-serif;
			}

			#Circulo{
				background-color: #d8d8d8;
				border-radius:15px;
				width: 14%;
				height: 23px;
				cursor: pointer;
				line-height: 22px;
				border: 2px black solid;
			}

			#Informacao:hover #Circulo{
				border-radius: 10px 10px 0px 0px;
			}

			#Informacao:hover div{
				display: block;
				border-radius: 0px 10px 10px 10px;
				border-bottom: none;
			}

			#Informacao{
				width: 35%;
			}

			#InformacaoTexto{
				position: absolute;
				display: none;
				border:2px black solid;
				border-top: none;
				background-color: #d8d8d8;
				border-radius: 0px 10px 10px;
				left:668px;
				opacity: 20%;
				width: 30%;
				color: red;
				filter:alpha(opacity=80);
			    opacity: 0.8;
			    -moz-opacity:0.8;
			    -webkit-opacity:0.8;
			}


			h1{
				color:#478389;
			}

			p{
				color: #529299;
			}

		</style>

		<center>
			<div id="Div_Formulario">
				<h1>Cadastre-se</h1>
				<form action="Cadastro.php" method="POST">
					<p>Usuário:</p>
					<input required minlength="6" type="text" name="Username"/>
					<p>Senha:</p>
					<input required minlength="6" type="password" name="Senha"/><br/><br/>
					<p>Confirme sua senha:</p>
					<input required minlength="6" type="password" max="15" name="Confirmacao"/><br/><br/>

					<div id="Informacao">
						<div id="Circulo">?</div>
						<div id="InformacaoTexto">
							<br/>
								* A senha precisa conter letras e números!
							<br/><br/>
								* As senhas devem conter SOMENTE letrar e números!
							<br/><br/>
								* Não são permitidos caracteres especiais ($#!@)!
							<br/><br/>
								* Não são  é permitido espaçamentos!
							<br/><br/>
								* A senha e o nome de usuário devem ter entre 6 e 15 caracteres!
						</div>
					</div>
					<br/>
					<input id="Botao" type="submit" value="Cadastrar" name="Enviar"/>
					<br/><br/>
					<div id="BotaoLogin" onclick="Login()">Faça seu login</div>

					<?php

				if(count($_POST) > 0){

					$Username = $_POST['Username'];
					$Senha = $_POST['Senha'];
					$Senha2 = $_POST['Confirmacao'];
					$Tamanho = strlen($Senha);

					$string = $Senha;

					if(ctype_alpha($string) or is_numeric($string)){
						die("<br/><p style=\"color:red\">A senha deve conter letras e números!</p>");
					}

					if(!preg_match("/^([a-z-0-9]+)$/i",$string)) {
						die("<br/><p style=\"color:red\">A senha possui caracteres não permitidos!</p>");
					}

					if($Senha != $Senha2){
						die("<br/><p style=\"color:red\"> As senhas não são iguais! </p>");
					}
					
					$sql = "INSERT INTO Usuario VALUES('$Username','$Senha',0)";

					$conexao = mysqli_connect("localhost","root","root","Fator");

					if (!$conexao)
						die("Falha de conexão: " . mysqli_connect_error());

					$resultado = mysqli_query($conexao, $sql);

					if($resultado){
						print("<br/><p style=\"color:#5ea535\">Usuário cadastrado com sucesso!</p>");
					}else{
						print("<br/><p style=\"color:red\">Esse nome de usuário já existe!</p>");
					}

					mysqli_close($conexao);
				}

			?>

					<br/><br/>
				</form>
			</div>
		</center>

	</body>
</html>