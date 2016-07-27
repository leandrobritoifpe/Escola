<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Consulta Responsável :.</title>
<style type="text/css">

 .botao{
        font-size:12px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#000066;
        border:1px;
        width:130px;
        height:25px;
       }


.texto {
	font-family: Verdana, Geneva, sans-serif;
}
.tamanho {
	font-size: 12px;
}
.cor {
	color: #00C;
	font-family: Verdana, Geneva, sans-serif;
}
.bb {
	font-family: Verdana, Geneva, sans-serif;
}
#xx {
	font-size: 12px;
	color: #00F;
	font-family: Verdana, Geneva, sans-serif;
}
#xx {
	font-size: 12px;
}
</style>
</head>

<script language="JavaScript">
 /*
 A função Mascara tera como valores no argumento os dados inseridos no input (ou no evento onkeypress)
 onkeypress="mascara(this, '## ####-####')"
 onkeypress = chama uma função quando uma tecla é pressionada, no exemplo acima, chama a função mascara e define os valores do argumento na função
 O primeiro valor é o this, é o Apontador/Indicador da Mascara, o '## ####-####' é o modelo / formato da mascara
 no exemplo acima o # indica os números, e o - (hifen) o caracter que será inserido entre os números, ou seja, no exemplo acima o telefone ficara assim: 11-4000-3562
 para o celular de são paulo o modelo deverá ser assim: '## #####-####' [11 98563-1254]
 para o RG '##.###.###.# [40.123.456.7]
 para o CPF '###.###.###.##' [789.456.123.10]
 Ou seja esta mascara tem como objetivo inserir o hifen ou espaço automáticamente quando o usuário inserir o número do celular, cpf, rg, etc 

 lembrando que o hifen ou qualquer outro caracter é contado tambem, como: 11-4561-6543 temos 10 números e 2 hifens, por isso o valor de maxlength será 12
 <input type="text" name="telefone" onkeypress="mascara(this, '## ####-####')" maxlength="12">
 neste código não é possivel inserir () ou [], apenas . (ponto), - (hifén) ou espaço
 */

function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 </script>
 <!-- fim da função mascará telefone -->


<body>

<?php
  require_once(conecta_db.php);
  
  $nome = $_GET ["edt_nome"];
  $cpf = $_GET ["edt_cpf"];
  $cod_empresa = '1';
  $cod_filial = '1';
  
  $query = mysql_query('select * from w_cad_responsavel where cod_empresa = "$cod_empresa" and cod_filial = "$cod_filial"
  						order by nome');
?>

<div align="center">
  <table width="500" border="0">
    <tr>
      <th height="162" colspan="2" scope="row"><img src="image/LOGO_EPC.jpg" width="312" height="151" /></th>
    </tr>
    <tr>
      <th width="413" rowspan="2" scope="row"><img src="image/consulta_responsavel.jpg" width="413" height="59" align="left" /></th>
      <th width="77" scope="row"><a href="cadastro_responsavel.php"><img src="image/menu.jpg" width="57" height="57" /></a></th>
    </tr>
    <tr>
      <th id="xx" scope="row">Voltar</th>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#0099FF" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#FFFFFF" scope="row">&nbsp;</th>
    </tr>
  </table>
</div>

<form id="consulta_responsavel" name="consulta_responsavel" method="get" action="consulta_responsavel.php">
<div align="center">
  <table width="500" border="0">
    <tr>
      <th height="21" colspan="2" scope="row"><span class="cor" id="xx">Filtros</span></th>
      </tr>
    <tr>
      <th width="122" height="21" scope="row"><span class="cor" id="xx">Nome: </span></th>
      <th width="368" scope="row"><div align="left">
        <input name="edt_nome" type="text" id="edt_nome" size="50" maxlength="50" />
      </div>
      </label></th>
    </tr>
    <tr>
      <th bgcolor="#FFFFFF" scope="row"><span class="cor" id="xx">CPF:</span></th>
      <th bgcolor="#FFFFFF" scope="row"><div align="left">
        <input name="edt_cpf" type="text" id="edt_cpf" OnKeyUp="mascara(this, '###.###.###-##');" maxlength="13" />
      </div>
      </label></th>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#FFFFFF" scope="row"><input type="submit" name="bit_consulta" id="bit_consulta" value="Consultar" class="botao" /></th>
      </tr>
    <tr>
      <th colspan="2" bgcolor="#0099FF" scope="row">&nbsp;</th>
      </tr>
  </table>
</div>

</form>


</body>

</html>
