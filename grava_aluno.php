<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Cadastro de Aluno :.</title>
</head>

<body>

<?php
  /*require_once("conecta_db.php");
  require_once("bib.php");  */
?>

<?php 

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

/*$nome	= $_POST ["edt_nome"];	//atribuição do campo "edt_nome" vindo do formulário para variavel	
$datanasctela = $_POST ["edt_datanasc"];	//atribuição do campo "edt_nome" vindo do formulário para variavel	
$datanasc = date_converter($datanasctela);
$cpf	= $_POST ["edt_cpf"];	//atribuição do campo "edt_cpf" vindo do formulário para variavel	
$email	= $_POST ["edt_email"];	//atribuição do campo "edt_email" vindo do formulário para variavel
$sexo	= $_POST ["edt_sexo"];	//atribuição do campo "edt_sexo" vindo do formulário para variavel
$telefone = $_POST ["edt_telefone"];	//atribuição do campo "edt_telefone" vindo do formulário para variavel
$celular	= $_POST ["edt_celular"];	//atribuição do campo "edt_celular" vindo do formulário para variavel
$cep	= $_POST ["edt_cep"];	//atribuição do campo "edt_cep" vindo do formulário para variavel
$endereco	= $_POST ["edt_endereco"];	//atribuição do campo "edt_endereco" vindo do formulário para variavel
$numero	= $_POST ["edt_numero"];	//atribuição do campo "edt_numero" vindo do formulário para variavel
$complemento	= $_POST ["edt_complemento"];	//atribuição do campo "edt_complemento" vindo do formulário para variavel
$cidade	= $_POST ["edt_cidade"];	//atribuição do campo "edt_cidade" vindo do formulário para variavel
$estado	= $_POST ["edt_estado"];	//atribuição do campo "edt_estado" vindo do formulário para variavel
$bairro = $_POST ["edt_bairro"];	//atribuição do campo "edt_bairro" vindo do formulário para variavel
$obs	= $_POST ["edt_obs"];	//atribuição do campo "edt_obs" vindo do formulário para variavel
$empresa ='1';
$filial = '1';

//variaveis para pegar o codigo do responsavel
$separador = '.:.';
$texto_responsavel = $_POST ["edt_responsavel"];//atribuição do campo "edt_responsavel" vindo do formulário para variavel
$array_responsavel = explode($separador,$texto_responsavel);
$respon = $array_responsavel[0];

//FIM variaveis para pegar o codigo do responsavel



//Gravando no banco de dados !

//conectando com o localhost - mysql
$conexao = mysql_connect("localhost","root");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db("guardiao_epc",$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());


$query = "insert into w_cad_aluno (NOME, DATANASC, CPF_CNPJ, TELEFONE_1, CELULAR_1, ENDERECO,
NUMERO, COMPLEMENTO, BAIRRO, CIDADE, UF, EMAIL, OBS, COD_EMPRESA,
COD_FILIAL, SEXO, COD_RESPONSAVEL,CEP) values ('$nome', '$datanasc', '$cpf', '$telefone', '$celular', '$endereco',
'$numero', '$complemento', '$bairro', '$cidade', '$estado', '$email', '$obs', '$empresa', '$filial', '$sexo','$respon','$cep')";

mysql_query($query,$conexao) or die (mysql_error());

//echo $query;*/

?>-->

<p>&nbsp;
</p>
<table width="500" border="0" align="center">
  <tr>
    <th align="center" scope="row"><img src="image/LOGO_EPC.jpg" width="492" height="283" /></th>
  </tr>
  <tr>
    <th bgcolor="#0000FF" scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="25" align="center" valign="middle" id="msg" scope="row"><p><?php echo "Cadastro: " .$nome. " Realizado com sucesso.<br><br>"; ?></p></th>
  </tr>
  <tr>
    <th height="25" align="center" valign="middle" scope="row"><a href="cadastro_aluno.php" >.: Voltar :.</a></th>
  </tr>
  <tr>
    <th bgcolor="#0000FF" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>
