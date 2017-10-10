	<?php
		include("Includes/Conexao.php");
		include("Includes/Sessao.php");
		define("TITULO_PAGINA","$Usuario: Jogar");
		include("Includes/Cabecalho.php");
	?>	

		<script type="text/javascript">

			function Exibir(){
				window.location = ("jogar.php?ano=" + document.getElementById("Ano").value);
			}

			function Mostrar(){
				document.getElementById("Texto").innerHTML = "";
				<?php 
						$Ano = $_GET['ano'];
						$sql = "SELECT DISTINCT(materia) FROM Questao where ano = $Ano";
						$resultado = mysqli_query($conexao, $sql);
						$Materias = mysqli_fetch_assoc($resultado);
						foreach ($Materias as $materia) {
				?> 
						document.getElementById("Texto").innerHTML += "<option value=\"<?= $materia ?>\"> <?= $materia ?> </option>";
				<?php
					}
				?>
			}
		</script>

		<h2>Jogar</h2>
		<h3>Selecione o ano:</h3>
		<select onchange="Exibir()" Id="Ano" name="ano">
			<option value="1"> Primeiro Ano </option>
			<option value="2"> Segundo Ano </option>
			<option value="3"> Terceiro Ano </option>
		</select>

		<div>
			<form action="jogando.php" method="GET">
				<label>Selecione a matéria:</label>
				<input type="hidden" name="ano" value="<?= $Ano ?>">
				<select name="Materia" id="Texto">
				</select>
				<input type="submit" value="Jogar">
			</form>
		</div>

		<script type="text/javascript">
			Mostrar();
		</script>

		<?php include("Includes/Rodape.php") ?>