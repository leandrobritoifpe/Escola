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

// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

/*$nome	= $_POST ["edt_nome"];	//atribui��o do campo "edt_nome" vindo do formul�rio para variavel	
$datanasctela = $_POST ["edt_datanasc"];	//atribui��o do campo "edt_nome" vindo do formul�rio para variavel	
$datanasc = date_converter($datanasctela);
$cpf	= $_POST ["edt_cpf"];	//atribui��o do campo "edt_cpf" vindo do formul�rio para variavel	
$email	= $_POST ["edt_email"];	//atribui��o do campo "edt_email" vindo do formul�rio para variavel
$sexo	= $_POST ["edt_sexo"];	//atribui��o do campo "edt_sexo" vindo do formul�rio para variavel
$telefone = $_POST ["edt_telefone"];	//atribui��o do campo "edt_telefone" vindo do formul�rio para variavel
$celular	= $_POST ["edt_celular"];	//atribui��o do campo "edt_celular" vindo do formul�rio para variavel
$cep	= $_POST ["edt_cep"];	//atribui��o do campo "edt_cep" vindo do formul�rio para variavel
$endereco	= $_POST ["edt_endereco"];	//atribui��o do campo "edt_endereco" vindo do formul�rio para variavel
$numero	= $_POST ["edt_numero"];	//atribui��o do campo "edt_numero" vindo do formul�rio para variavel
$complemento	= $_POST ["edt_complemento"];	//atribui��o do campo "edt_complemento" vindo do formul�rio para variavel
$cidade	= $_POST ["edt_cidade"];	//atribui��o do campo "edt_cidade" vindo do formul�rio para variavel
$estado	= $_POST ["edt_estado"];	//atribui��o do campo "edt_estado" vindo do formul�rio para variavel
$bairro = $_POST ["edt_bairro"];	//atribui��o do campo "edt_bairro" vindo do formul�rio para variavel
$obs	= $_POST ["edt_obs"];	//atribui��o do campo "edt_obs" vindo do formul�rio para variavel
$empresa ='1';
$filial = '1';

//variaveis para pegar o codigo do responsavel
$separador = '.:.';
$texto_responsavel = $_POST ["edt_responsavel"];//atribui��o do campo "edt_responsavel" vindo do formul�rio para variavel
$array_responsavel = explode($separador,$texto_responsavel);
$respon = $array_responsavel[0];

//FIM variaveis para pegar o codigo do responsavel



//Gravando no banco de dados !

//conectando com o localhost - mysql
$conexao = mysql_connect("localhost","root");
if (!$conexao)
	die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db("guardiao_epc",$conexao);
if (!$banco)
	die ("Erro de conex�o com banco de dados, o seguinte erro ocorreu -> ".mysql_error());


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
