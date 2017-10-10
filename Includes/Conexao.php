<?php
	$conexao = mysqli_connect("localhost","root","root","DBFatorReal");
	mysqli_set_charset($conexao, 'utf8');
	if (!$conexao){
		die("<br/>Conexao falhou: " . mysqli_connect_error());
	}
?> 