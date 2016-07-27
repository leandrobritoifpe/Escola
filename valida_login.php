<?php 

//FUNÇÃO PARA POR MASCARA EM STRINGS
function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}

        if (isset($_POST['cpf'])) {
        	
        	include_once 'conectaBanco.php';
			$con = abrirConexao();
			mysql_set_charset('UTF8', $con);
        	
        	$user = $_POST['user'];
    		$cpf = $_POST['cpf'];
    		$cpfMask = "";
    		
    		$origens = array('"',"'",'/','*','true','false','=','where','drop','delete','from','WHERE','DELETE','FROM','DROP','SELECT');
			$distino = "";
			$cpf_replace = str_replace($origens, $distino, $cpf);
   			$cpfMask = mask($cpf_replace,'###.###.###-##');
   			
   			$sql = "select * from cad_funcionario where codigo = '$user' and cpf = '$cpfMask'";
   			$resultado = mysql_query($sql);
   			$cont = 0;
   			
        	while ($linha = mysql_fetch_array($resultado)) {
				$cont = $cont + 1;
			}
        	if($cont == 1) {
				$sql2 = mysql_query("select * from cad_funcionario where codigo = '$user' and cpf = '$cpfMask'");
				while ($usuario = mysql_fetch_object($sql2)){
					session_start();
					$_SESSION["CODIGO"] = $usuario->CODIGO;
					$_SESSION["USUARIO"] = $usuario->NOME;
					$_SESSION["CPF"] = $usuario->CPF;
					$_SESSION["EMPRESA"] = $usuario->EMPRESA;
					$_SESSION["FILIAL"] = $usuario->FILIAL;
					//$_SESSION["teste"] = "";
					echo "<script>window.location='home.php';alert('BEM VINDO');</script>";
					mysql_close($con);
				}
			}
			else {
				echo "<script>window.location='index.php';alert('CPF INVÁLIDO PARA ESSE USUÁRIO');</script>";
			}
        }
        elseif (isset($_GET["sair"])) {
       		 session_start();
			if ($_GET["sair"] == 'sair') {
				session_destroy();
				header("Location: index.php");
			}
        	;
        }
        
        else {
        	header("Location: index.php");
        }
               
            /*$verifica = mysql_query("SELECT * FROM usuarios WHERE nome = '$login' AND senha = '$senha'") /*or die("erro ao selecionar");
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Nome do Usuário e/ou senha incorretos');window.location.href='login.php';</script>";
                    die();
                }else{
                    setcookie("login",$login);
                    header("Location:index.php");
                }
        }*/
?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Login :.</title>
</head>

<body>

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
    <th height="25" align="center" valign="middle" id="msg" scope="row">
    <p>
    
    </p></th>
  </tr>
  <tr>
    <th height="25" align="center" valign="middle" scope="row"><a href="login.php">.: Voltar :.</a></th>
  </tr>
  <tr>
    <th bgcolor="#0000FF" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>
-->