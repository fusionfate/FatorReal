	
	<?php
		include("Includes/Conexao.php");
		include("Includes/Sessao.php");
		define("TITULO_PAGINA","$Usuario: Página Inicial");
		include("Includes/Cabecalho.php");
	?>

		<ul>
			<?php 
				$sql = "SELECT Username, Pontuacao FROM Usuario ORDER BY Pontuacao DESC";
				$i = 1;

				$resultado = mysqli_query($conexao, $sql);

				if (mysqli_num_rows($resultado) == 0)
					print "Nenhuma Potuação!";
						
				while ($linha = mysqli_fetch_assoc($resultado)){
					if ($i == 6) {
						break;
					}
					print "<h3>". $i . "º Lugar " . $linha['Username'] . " " . $linha['Pontuacao'] . "</h3>";
					$i++;
				}
			?>
		</ul>	

		<?php include("Includes/Rodape.php") ?>