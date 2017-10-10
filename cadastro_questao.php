<?php
	include("Includes/Conexao.php");
	include("Includes/Sessao.php");
	define("TITULO_PAGINA","Cadastrar Questão");
	include("Includes/Cabecalho.php");
?>

		<?php
			$Materias1 = Array();
			$Materias1 = [
				'Conjuntos',
				'Função de 1° Grau',
				'Função de 1° Grau',
				'Função de 2° Grau',
				'Função Modular',
				'Função Exponencial',
				'Função Logaritmica',
				'PA/PG',
				'Trigonometria no Triângulo Retângulo'
			];

			$Materias2 = Array();
			$Materias2 = [
				'Função Trigonometrica',
				'Matrizes',
				'Determinante',
				'Sistema de Equações Lineares'
			];

			$Materias3 = Array();
			$Materias3 = [
				'Estatística',
				'Probabilidade',
				'Analise Combinatória',
				'Matemática Financeira',
				'Polinômeos e Equações Algébricas',
				'Geometria Analítica',
				'Números Complexos'
			];
		?>
		<script type="text/javascript">
			function Selecionar(){
				document.getElementById("Materias").innerHTML = "";
				if(document.getElementById("Ano").value == 1){
					<?php
						foreach ($Materias1 as $materia) {
					?> 
						document.getElementById("Materias").innerHTML += "<option value=\"<?= $materia ?>\"> <?= $materia ?> </option>";
					<?php
						}
					?>
				}else if(document.getElementById("Ano").value == 2){
					<?php
						foreach ($Materias2 as $materia) {
					?> 
						document.getElementById("Materias").innerHTML += "<option value=\"<?= $materia ?>\"> <?= $materia ?> </option>";
					<?php
						}
					?>
				}else if(document.getElementById("Ano").value == 3){
					<?php
						foreach ($Materias3 as $materia) {
					?> 
						document.getElementById("Materias").innerHTML += "<option value=\"<?= $materia ?>\"> <?= $materia ?> </option>";
					<?php
						}
					?>
				}
			}
		</script>

		<form action="cadastrar_questao.php" method="post">

			<label> Ano: </label>
			<select name="ano" id="Ano" onchange="Selecionar()">
				<option value="1" > 1° Ano </option>
				<option value="2" > 2° Ano </option>
				<option value="3" > 3° Ano </option>
			</select>
			<br/>

			<label> Materia: </label>
			<select name="materia" id="Materias">
				
			</select><br/>

			<label> Enunciado: </label>
			<textarea name="enunciado" maxlength="500" >  </textarea><br/>
			
			<label> Alternativa 1: </label>
			<input type="text" name="Alternativa1"/><br/>

			<label> Alternativa 2: </label>
			<input type="text" name="Alternativa2"/><br/>

			<label> Alternativa 3: </label>
			<input type="text" name="Alternativa3"/><br/>

			<label> Alternativa 4: </label>
			<input type="text" name="Alternativa4"/><br/>

			<label> Alternativa 5: </label>
			<input type="text" name="Alternativa5"/><br/>

			<label> Alternativa Correta: </label>
			<select name="Correta">
				<option value="Alternativa1">Alternativa1</option>
				<option value="Alternativa2">Alternativa2</option>
				<option value="Alternativa3">Alternativa3</option>
				<option value="Alternativa4">Alternativa4</option>
				<option value="Alternativa5">Alternativa5</option>
			</select>

			<br/><label> Pontuação: </label>
			<input type="radio" name="pontos" value="1" /><label>1 ponto </label>
			<input type="radio" name="pontos" value="2" /><label>2 pontos</label>
			<input type="radio" name="pontos" value="3" /><label>3 pontos</label>
			<br/>
			<input type="submit" name="enviar" value="Cadastrar"/>
		</form>

		<?php include("Includes/Rodape.php") ?>