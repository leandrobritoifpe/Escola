<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Cadastro de Respons&aacute;vel :.</title>
</head>

<body>

<?php
  include("conecta_db.php");
?>

<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

$nome	= $_POST ["edt_nome"];	//atribui��o do campo "edt_nome" vindo do formul�rio para variavel	
$cpf	= $_POST ["edt_cpf"];	//atribui��o do campo "edt_cpf" vindo do formul�rio para variavel	
$email	= $_POST ["edt_email"];	//atribui��o do campo "edt_email" vindo do formul�rio para variavel
$sexo	= $_POST ["edt_sexo"];	//atribui��o do campo "edt_sexo" vindo do formul�rio para variavel
$telefone = $_POST ["edt_telefone"];	//atribui��o do campo "edt_telefone" vindo do formul�rio para variavel
$celular	= $_POST ["edt_celular"];	//atribui��o do campo "edt_celular" vindo do formul�rio para variavel
$endereco	= $_POST ["edt_endereco"];	//atribui��o do campo "edt_endereco" vindo do formul�rio para variavel
$cep	= $_POST ["edt_cep"];	//atribui��o do campo "edt_cep" vindo do formul�rio para variavel
$numero	= $_POST ["edt_numero"];	//atribui��o do campo "edt_numero" vindo do formul�rio para variavel
$complemento	= $_POST ["edt_complemento"];	//atribui��o do campo "edt_complemento" vindo do formul�rio para variavel
$cidade	= $_POST ["edt_cidade"];	//atribui��o do campo "edt_cidade" vindo do formul�rio para variavel
$estado	= $_POST ["edt_estado"];	//atribui��o do campo "edt_estado" vindo do formul�rio para variavel
$bairro = $_POST ["edt_bairro"];	//atribui��o do campo "edt_bairro" vindo do formul�rio para variavel
$parentesco	= $_POST ["edt_parentesco"];	//atribui��o do campo "edt_parentesco" vindo do formul�rio para variavel
$obs	= $_POST ["edt_obs"];	//atribui��o do campo "edt_obs" vindo do formul�rio para variavel
$empresa ='1';
$filial = '1';
//Gravando no banco de dados !

  $query = "insert into w_cad_responsavel (NOME, CPF_CNPJ, TELEFONE_1, CELULAR_1, ENDERECO,
           	NUMERO, COMPLEMENTO, BAIRRO, CIDADE, UF, GRAU_PARANTESCO, EMAIL, OBS, COD_EMPRESA,
			COD_FILIAL, SEXO) values ('$nome', '$cpf', '$telefone', '$celular', '$endereco',
			'$numero', '$complemento', '$bairro', '$cidade', '$estado', '$parentesco', '$email', '$obs', '$empresa', '$filial', 				            '$sexo','$cep')";
				
  mysql_query($query,$conexao);  //die "Erro na Instru��o SQL: ".(mysql_error());

?>

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
    <th height="25" align="center" valign="middle" scope="row"><a href="cadastro_responsavel.php" >.: Voltar :.</a></th>
  </tr>
  <tr>
    <th bgcolor="#0000FF" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>
