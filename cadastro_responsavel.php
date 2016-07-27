<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Cadastro de Respons&aacute;vel :.</title>

<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: x-small;
	text-align: left;
}
.style3 {color: #0000FF; font-size: x-small; }
#cadastro table tr td {
	text-align: center;
}
#cadastro table tr td {
	font-family: Verdana, Geneva, sans-serif;
}
#cadastro table tr td {
	font-size: 12px;
}
#cadastro table tr td {
	font-size: 10px;
	font-weight: bold;
	text-align: left;
}
#cadastro table {
	text-align: center;
}
#cadastro table tr {
	text-align: center;
}
table {
	text-align: center;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	text-align: left;
}

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
#cadastro_responsavel {
	color: #00F;
}
-->
</style>

<script type="text/javascript">
function validaCampo()
{
if(document.cadastro_responsavel.edt_nome.value=="")
	{
	alert("O Campo Nome é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_cpf.value=="")
	{
	alert("O Campo CPF é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_email.value=="")
	{
	alert("O Campo Email é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_endereco.value=="")
	{
	alert("O Campo Endereço é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_bairro.value=="")
	{
	alert("O Campo Bairro é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_cidade.value=="")
	{
	alert("O Campo Cidade é obrigatório!");
	return false;
	}
else
	if(document.cadastro_responsavel.edt_estado.value=="Selecione...")
	{
	alert("O Campo Estado é obrigatório!");
	return false;
	}
else
return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>

<!-- Mascará de data -->
<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var edt_datanasc = campoData.value;
              if (edt_datanasc.length == 2){
                  edt_datanasc = edt_datanasc + '/';
                  document.forms[0].edt_datanasc.value = edt_datanasc;
      return true;              
              }
              if (edt_datanasc.length == 5){
                  edt_datanasc = edt_datanasc + '/';
                  document.forms[0].edt_datanasc.value = edt_datanasc;
                  return true;
              }
         }
</script>
<!-- Fim do JavaScript que faz a mascará de data -->

 <!-- função mascará telefone -->
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

</head>

<body>
  <!--  COM.1 = ESTE CÓDIGO É USADO PARA DEIXAR MEU SITE RESPONSIVEL-->
  <div class=”container”>
    <div class="one-third column">

<form id="cadastro_responsavel" name="cadastro_responsavel" method="post" action="grava_responsavel.php" onsubmit="return validaCampo(); return false;">
  <table width="560" border="0" align="center">
    <tr>
      <td colspan="5" bgcolor="#FFFFFF" align="center"><img src="image/LOGO_EPC.jpg" width="251" height="134" alt="LOGO" /></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="2" bgcolor="#FFFFFF"><img src="image/cadastro_responsavel.jpg" width="413" height="59" alt="menu" /></td>
      <td " bgcolor="#FFFFFF"><div align="center"><img src="image/localiza.jpg" width="28" height="28" align="middle" /></div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div align="center" id="cadastro_responsavel">Consultar</div></td>
    </tr>
    <tr>
      <td colspan="5" bgcolor="#0099FF" align="center">&nbsp;</td>
    </tr>    
      <tr>
      <td width="94">Nome:</td>
      <td colspan="4"><input name="edt_nome" type="text" id="edt_nome" size="70" maxlength="50" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
        <td>CPF:</td>
        <td colspan="4"><input name="edt_cpf" type="text" id="edt_cpf" OnKeyUp="mascara(this, '###.###.###-##');" maxlength="18" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td colspan="4"><input name="edt_email" type="text" id="edt_email" size="70" maxlength="200" />
      <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Sexo:</td>
      <td colspan="4"><input name="edt_sexo" type="radio" value="Masculino" checked="checked" />
        Masculino 
        <input name="edt_sexo" type="radio" value="Feminino" />
        Feminino <span class="style1">*</span> </td>
    </tr>
    <tr>
      <td>Telefone:</td>
      <td colspan="4"><input name="edt_telefone" type="text" id="edt_telefone" OnKeyUp="mascara(this, '##.####.####');" maxlength="13" />        
       <span class="style3">Somente N&uacute;meros</span></td>
    </tr>
    <tr>
      <td>Celular:</td>
      <td colspan="4"><span class="style1">
        <input name="edt_celular" type="text" id="edt_celular" OnKeyUp="mascara(this, '##.####.####');"maxlength="13" />
        <span class="style3">Somente N&uacute;meros</span></span></td>
    </tr>
    <tr>
      <td>Cep:</td>
      <td colspan="4"><span class="style1">
        <input name="edt_cep" type="text" id="edt_cep" onkeyup="mascara(this, '##.####.####');"maxlength="10" />
      </span></td>
    </tr>
    <tr>
      <td>Endere&ccedil;o:</td>
      <td colspan="4"><input name="edt_endereco" type="text" id="edt_endereco" size="70" maxlength="50" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>N&uacute;mero:</td>
      <td colspan="4"><input name="edt_numero" type="text" id="edt_numero" maxlength="10" /></td>
    </tr>
    <tr>
      <td>Complemento:</td>
      <td colspan="4"><input name="edt_complemento" type="text" id="edt_complemento" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td colspan="4"><span class="style1">
        <input name="edt_bairro" type="text" id="edt_bairro" maxlength="30" />
      *</span></td>
    </tr>
    <tr>
      <td>Cidade:</td>
      <td colspan="4"><span class="style1">
        <input name="edt_cidade" type="text" id="edt_cidade" maxlength="30" />
      *      </span></td>
    </tr>
    <tr>
      <td>Estado:</td>
      <td colspan="4"><span class="style1">
        <select name="edt_estado" id="edt_estado">
          <option>Selecione...</option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="ES">ES</option>
          <option value="DF">DF</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
        </select>
        *</span></td>
    </tr>
    <tr>
      <td>Parentesco:</td>
      <td colspan="4"><input name="edt_parentesco" type="text" id="edt_parentesco" maxlength="30" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Obs.:</td>
      <td colspan="4"><label for="edt_obs"></label>
        <label for="obs2"></label>
      <textarea name="edt_obs" id="obs2" cols="50" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><div align="center"><span class="style1">* Campos  s&atilde;o obrigat&oacute;rios!</span></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" bgcolor="#0099FF">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="baseline"><p><br>
      </p>
        <pre>&nbsp;</pre>
      <td width="61" align="center" valign="baseline">      
      <td width="153" align="center" valign="baseline"><input name="cadastrar" type="submit" id="cadastrar" value="Gravar" class="botao" />            
      <td width="132" align="right" valign="baseline"><input name="limpar" type="reset" id="limpar" value="Limpar" class="botao" />                  
      <td width="98" align="right" valign="baseline">      
    </tr>
    <tr>
      <th colspan="5" align="center"><p class="style1">&nbsp;</p>                                  
    </tr>
   
  </table>
</form>
  
  </div>
  
</body>


</html>

