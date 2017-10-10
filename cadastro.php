		<?php
			include("Includes/Conexao.php");
			define("TITULO_PAGINA","Cadastro");
		?>
		
		<form action="cadastro.php" method="POST">
			<label> Usuário: </label>
			<input type="text" name="username" placeholder="Digite o seu Username" required=""/> <br/>
			<label> Senha: </label>
			<input type="password" name="senha" placeholder="Digite a sua Senha" required=""/> <br/>
			<label> Confirmar Senha: </label>
			<input type="password" name="conf_senha" placeholder="Confirme a sua Senha" required=""/> <br/>
			<input type="submit" name="cadastrar" value="Cadastrar"/>
		</form>

		<?php
			if(count($_POST) > 0){
				
				$username = $_POST['username'];
				$senha = $_POST['senha'];
				$conf_senha = $_POST['conf_senha'];
				
				if($senha != $conf_senha){
					echo "Senhas diferentes";
				}
			
				$SQL = "INSERT INTO Usuario VALUES ('$username', '$senha', DEFAULT)";

				$resultado = mysqli_query($conexao, $SQL);
				if($resultado){
					echo "Usuário Cadastrado";
				}
				else{
					echo "Falha no cadastro";
				}
			}
		?>

		<a href="login.php"> Já esta cadastrado? Faça seu login aqui </a>
		
		<?php include("Includes/Rodape.php") ?>