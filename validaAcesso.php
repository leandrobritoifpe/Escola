<?php 
	session_start();

	if (isset($_SESSION["USUARIO"])) {
		$nome = $_SESSION["USUARIO"];
		$cpf = $_SESSION["CPF"];
		$codigo  = $_SESSION["CODIGO"];
	}
	else {
		header("Location: index.php");
	}
?>