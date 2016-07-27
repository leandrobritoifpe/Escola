<?php
function abrirConexao() {
	
	$con = @mysql_connect("newbird.ddns.com.br", "root", "102030");
	
	if (! $con) {
		die ("Erro ao abrir a conexao com o MySQL: " . mysql_error ());
	}
	
	mysql_select_db ("guardiao_mansilla", $con);
	
	return $con;
}
?>