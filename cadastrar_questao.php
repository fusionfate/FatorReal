<?php
	include("Includes/Sessao.php");
	include("Includes/Conexao.php");
	define("TITULO_PAGINA","Cadastrar Questão");
	include("Includes/Cabecalho.php");

	if(count($_POST) > 0){

		$Ano = $_POST['ano'];
		$Materia = $_POST['materia'];
		$Pergunta = $_POST['enunciado'];
		$Alternativa1 = $_POST['Alternativa1'];
		$Alternativa2 = $_POST['Alternativa2'];
		$Alternativa3 = $_POST['Alternativa3'];
		$Alternativa4 = $_POST['Alternativa4'];
		$Alternativa5 = $_POST['Alternativa5'];
		$Correta = $_POST['Correta'];
		$pontos = $_POST['pontos'];

		$Verificar = "SELECT * FROM Questao WHERE enunciado = '$Pergunta'";
		$Resultado = mysqli_query($conexao, $Verificar);
		if(mysqli_num_rows($Resultado) == 0){

			$Inserir = "
			INSERT INTO Questao 
			VALUES(default,$Ano,'$Materia','$Pergunta','$Alternativa1','$Alternativa2','$Alternativa3','$Alternativa4','$Alternativa5','$Correta',$pontos)
			";

			$Cadastrar = mysqli_query($conexao, $Inserir);

			if($Cadastrar){
				print("<br/><p> Questão cadastrada com sucesso! </p>");
			}
		}else{
			print("<br/><p> Questão já cadastrada! </p>");
		}
	}

	include("Includes/Rodape.php");
?>