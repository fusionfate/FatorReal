<?php
	include("Includes/Conexao.php");
	include("Includes/Sessao.php");
	define("TITULO_PAGINA","$Usuario: Jogando");
	include("Includes/Cabecalho.php");

	$Ano = $_GET['ano'];
	$Materia = $_GET['Materia'];

	$ObterIds = "SELECT id FROM Questao WHERE Ano = $Ano AND materia = '$Materia'";
	$Resultado = mysqli_query($conexao, $ObterIds);
	$Nao_Respondeu = 0;

?>
	<?php 

		while ($Ids = mysqli_fetch_assoc($Resultado)) {
			$id = $Ids['id'];
			$ObterEstado="SELECT Estado FROM Estado WHERE Questao_Id = $id AND Usuario_Username = '$Usuario'";
			$Estados = mysqli_query($conexao, $ObterEstado);

			if(mysqli_num_rows($Estados) == 0){ 
				$ObterQuestao="SELECT * FROM Questao WHERE id = $id";
				$Questoes = mysqli_query($conexao,$ObterQuestao);
				$Questao = mysqli_fetch_assoc($Questoes);
	?>

		<h1>Matéria atual: <?= $Materia ?></h1>
		<h1>Ano atual: <?= $Ano ?></h1>
		<form id="Formulario" action="Responder.php" method="POST">
			<input name="Pergunta" type="hidden" id="seu_campo" value="<?= $Questao['enunciado'] ?>" />  <?= $Questao['enunciado'] ?>
			<input type="radio" name="escolha" value="Alternativa1">  <?= $Questao['alternativa1'] ?>
			<input type="radio" name="escolha" value="Alternativa2">  <?= $Questao['alternativa2'] ?>
			<input type="radio" name="escolha" value="Alternativa3">  <?= $Questao['alternativa3'] ?>
			<input type="radio" name="escolha" value="Alternativa4">  <?= $Questao['alternativa4'] ?>
			<input type="radio" name="escolha" value="Alternativa5">  <?= $Questao['alternativa5'] ?>
			<input name="Ano" type="hidden" id="seu_campo" value="<?= $Ano ?>"/>
			<input name="Id" type="hidden" id="seu_campo" value="<?= $Questao['id'] ?>"/>
			<input name="Materia" type="hidden" id="seu_campo" value="<?= $Materia ?>"/>
			<input type="submit" name="" value="Responder">
		</form>

	<?php 	
				$Nao_Respondeu = 1;
				break;
			}
		} 
		if($Nao_Respondeu == 0){
			print("Todas as questões do ".$Ano."º ano foram respondidas!");
		}
	?>

	<?php include("Includes/Rodape.php") ?>