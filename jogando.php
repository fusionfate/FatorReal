<?php
	include("Includes/Conexao.php");
	include("Includes/Sessao.php");
	define("TITULO_PAGINA","$Usuario: Jogando");
	include("Includes/Cabecalho.php");

	$Ano = $_GET['ano'];
	$Materia = $_GET['Materia'];
	$Achou = 0;
	$ObterIds = "SELECT id FROM Questao WHERE Ano = $Ano AND materia = '$Materia'";
	$Resultado = mysqli_query($conexao, $ObterIds);

?>
	<center>

	<?php while($Ids = mysqli_fetch_assoc($Resultado)){ 
			$ObterEstado = "SELECT * FROM Estado WHERE Questao_id = ".$Ids['id']."";
			$result = mysqli_query($conexao, $ObterEstado);
			if(mysqli_num_rows($result) == 0){
				$Achou = 1;
				$ObterQuestao = "SELECT * FROM Questao WHERE id = ".$Ids['id']."";
				$result = mysqli_query($conexao, $ObterQuestao);
				$Questao = mysqli_fetch_assoc($result);
	?>

		<h1>Matéria atual: <?= $Materia ?></h1>
		<h1>Ano atual: <?= $Ano ?></h1>
		<form id="Formulario" action="Responder.php" method="POST">
			<input name="Pergunta" type="hidden" id="seu_campo" value="<?= $Questao['enunciado'] ?>" />  <?= $Questao['enunciado'] ?>
			<input type="radio" name="escolha" value="<?= $Questao['alternativa1'] ?>">  <?= $Questao['alternativa1'] ?>
			<input type="radio" name="escolha" value="<?= $Questao['alternativa2'] ?>">  <?= $Questao['alternativa2'] ?>
			<input type="radio" name="escolha" value="<?= $Questao['alternativa3'] ?>">  <?= $Questao['alternativa3'] ?>
			<input type="radio" name="escolha" value="<?= $Questao['alternativa4'] ?>">  <?= $Questao['alternativa4'] ?>
			<input type="radio" name="escolha" value="<?= $Questao['alternativa5'] ?>">  <?= $Questao['alternativa5'] ?>
			<input name="Ano" type="hidden" id="seu_campo" value="<?= $Ano ?>"/>
			<input name="Id" type="hidden" id="seu_campo" value="<?= $Questao['id'] ?>"/>
			<input name="Materia" type="hidden" id="seu_campo" value="<?= $Materia ?>"/>
			<input type="submit" name="" value="Responder">
		</form>

	<?php 
			break;
			}
		} 

		if($Achou == 0){ ?>
			<br/><h3>Todas as questões já foram respondidas!</h3>
		<?php }
	?>

	</center>

	<?php include("Includes/Rodape.php"); ?>