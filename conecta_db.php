<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conecta Banco de Dados!</title>
</head>

<?php
  $conexao = mysql_connect("192.168.25.250","root",102030);
  if (!$conexao) die("Erro ao tentar logar com o Banco de Dados: ".mysql_errno()); 	
?>

<?php
  $banco = mysql_select_db("guardiao_nb",$conexao);
  if (!$banco) die("Erro ao Conectar o Banco: ".$banco." ".mysql_errno());
?>
<body>

</body>
</html>