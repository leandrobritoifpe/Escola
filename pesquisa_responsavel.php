<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<style type="text/css">
.Pesquisa {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #03F;
}
.t {
	color: #03F;
}
.n {
	font-size: 12px;
	font-family: Verdana, Geneva, sans-serif;
	color: #FFF;
}
</style>
</head>

<body>
<table width="500" border="0" align="center">
  <tr>
    <th scope="row"><img src="image/LOGO_EPC.jpg" width="343" height="172" /></th>
  </tr>
  <tr>
    <th class="Pesquisa" scope="row">Pesquisa Responsável</th>
  </tr>
  <tr>
    <th class="n" scope="row">hhhh</th>
  </tr>
</table>

<?php
  include("conecta_db.php");
?>

<?php
$qry = mysql_query("select w.ID_CODIGO as CODIGO, w.CPF_CNPJ as CPF, w.NOME from w_cad_responsavel w order by w.NOME");

//Pegando os nomes dos campos

$num_fields = mysql_num_fields($qry);//Obtém o número de campos do resultado

for($i = 0;$i<$num_fields; $i++){//Pega o nome dos campos
	$fields[] = mysql_field_name($qry,$i);
}

//Montando o cabeçalho da tabela
$table = '<table width="500" border="0" align="center" ><tr>';

for($i = 0;$i < $num_fields; $i++){
	$table .= '<th style="size:10" bgcolor="#0033FF" class="n" scope="row">'.$fields[$i].'</th>';
}

//Montando o corpo da tabela
$table .= '<tbody>';
while($r = mysql_fetch_array($qry)){
	$table .= '<tr>';
	for($i = 0;$i < $num_fields; $i++){
		$table .= '<td>'.$r[$fields[$i]].'</td>';
	}
	$table .= '</tr>';
}

//Finalizando a tabela
$table .= '</tbody></table>';

//Imprimindo a tabela
echo $table;

?>
</body>
</html>