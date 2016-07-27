
<?php 
	session_start();

	if (isset($_SESSION["USUARIO"])) {
		header("Location: home.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>.: Login :.</title>

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
	font-size: 12px;
	font-family: Verdana,Helvetica;
	font-weight: bold;
	color: white;
	background: #000066;
	border: 1px;
	width: 140px;
	height: 25px;
	text-align: center;
       }
-->
</style>
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js_file/jquery.maskMoney.js"></script>
</head>



<body>
  <!--  COM.1 = ESTE C�DIGO � USADO PARA DEIXAR MEU SITE RESPONSIVEL-->
  
  <div class=�container�>
    <div class="one-third column">

<form id="login" name="login" method="post" action="valida_login.php">
  <table width="444" border="0" align="center">
    <tr>
      <td rowspan="3" align="center" bgcolor="#FFFFFF"><img src="images/LOGO_EPC.jpg" width="159" height="119" alt="LOGO" /></td>
      <td height="41" align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    <tr>
      <td height="43" align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" align="center">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td height="16" colspan="7" bgcolor="#0099FF">&nbsp;</td>
    </tr>
    <tr>
      <td width="142" rowspan="4" bgcolor="#FFFFFF"><img src="image/login.jpg" width="142" height="142" alt="login" /></td>
      <td width="147" height="16" colspan="3" bgcolor="#FFFFFF">Usu&aacute;rio:</td>
      <td width="144" colspan="3" bgcolor="#FFFFFF">CPF:</td>
    </tr>
    <?php 
  		$conect = mysql_connect("newbird.ddns.com.br","root","102030");
			if(!$conect) {
			echo "Erro ao se conectar com o banco";
			}
		mysql_select_db("guardiao_nb", $conect);
	
		$query = mysql_query("select codigo,nome from cad_funcionario");
  	?>
    <tr>
      <td height="24" colspan="3" bgcolor="#FFFFFF">
      	<label>
             <div class="col-md-9">
               <select name="user" class="form-control" id="user" required="required">
                   <option value="Todos">Selecione</option>
                      <?php while($prod = mysql_fetch_array($query)) { ?>
						<option value="<?php echo $prod['codigo'] ?>"><?php echo $prod['nome'] ?></option>
						<?php  } mysql_close($conect)?>
                </select>
             </div>
      	</label>
      </td>
      <td width="140" colspan="3" bgcolor="#FFFFFF"><label>
        <input type="password" name="cpf" id="cpf" required="required" maxlength="11"/>
      </label></td>
    </tr>
    <tr>
      <td colspan="3" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="140" colspan="3" bgcolor="#FFFFFF"><input name="logar" type="submit" id="logar" value="Logar" class="botao" align=""/></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#FFFFFF"><input name="limpar" type="reset" id="limpar" value="Limpar" class="botao" /></td>
    </tr>
    <tr>
      <td colspan="7" bgcolor="#0099FF" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7" align="right" valign="baseline"><p><br>
        </p>
        <pre>&nbsp;</pre></tr>
    <tr>
      <th colspan="7" align="center"><p class="style1">&nbsp;</p>                                  
    </tr>
   
  </table>
</form>
  
  </div>

</body>
</html>

