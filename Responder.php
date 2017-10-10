
		<?php
			include("Includes/Conexao.php");
			include("Includes/Sessao.php");
			define("TITULO_PAGINA","$Usuario: Responder");
			include("Includes/Cabecalho.php");

			$Pergunta = $_POST['Pergunta'];
			$Resposta = $_POST['escolha'];
			$Ano = $_POST['Ano'];
			$Materia = $_POST['Materia'];
			$Id = $_POST['Id'];

			$ObterQuestao = "SELECT * FROM Questao WHERE enunciado = '$Pergunta'";
			$Obter = mysqli_query($conexao, $ObterQuestao);
			$Questao = mysqli_fetch_assoc($Obter);

			$Verificar = "SELECT * FROM Estado WHERE Questao_Id = $Id AND Usuario_Username = '$Usuario'";
			$VerificarQuestao = mysqli_query($conexao,$Verificar);

			if(mysqli_num_rows($VerificarQuestao) == 0){

				$InserirEstado = "INSERT INTO Estado VALUES('$Usuario',$Id,1,'$Resposta')";
				$Inserir = mysqli_query($conexao, $InserirEstado);

				if($Resposta == $Questao['alt_correta']){
					$MudarPontuacao = "UPDATE Usuario SET pontuacao = pontuacao + ".$Questao['pontuacao_valor']." WHERE Username = '$Usuario'";
					$Mudar = mysqli_query($conexao, $MudarPontuacao);
				}
			}
		?>

		<center>

			<h2>Bem vindo <?= $Usuario ?>!</h2>
			<h1>Questão Respondida!</h1>

			<form action="jogando.php?ano=<?= $Ano ?>&Materia=<?= $Materia ?>" method="POST">
				Pergunta: <?= $Questao['enunciado'] ?>
				<br/>Alternativa 1: <?= $Questao['alternativa1'] ?>
				<br/>Alternativa 2: <?= $Questao['alternativa2'] ?>
				<br/>Alternativa 3: <?= $Questao['alternativa3'] ?>
				<br/>Alternativa 4: <?= $Questao['alternativa4'] ?>
				<br/>Alternativa 5: <?= $Questao['alternativa5'] ?>
				<?php if($Resposta == $Questao['alt_correta']){ ?>
					<p style="color:green">
						Acerto!
						Você ganhou <?= $Questao['pontuacao_valor'] ?> pontos.
					</p>
				<?php }else{ ?>
					<p style="color:red">
						Errado!
						Resposta Certa: <?= $Questao['alt_correta'] ?>
					</p>
				<?php } ?>
				<p style="color:green">
					Sua resposta: <?= $Resposta ?>
				</p>
				<input value="Avançar" type="submit">
			</form>
		</center>

		<?php include("Includes/Rodape.php") ?>