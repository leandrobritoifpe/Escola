<?php 
	if (isset($_POST["codigoAlunoVer"])) {
		
		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		$codigo = $_POST['codigoAlunoVer'];
		
		$sql = mysql_query("select * from esc_cad_aluno_capa where codigo = '$codigo'");
		$array = array();
		while ($linha = mysql_fetch_array($sql)){
			$array[] = $linha['NOME'];
			$array[] = $linha['CPF'];
			$array[] = $linha['RG'];
			$array[] = $linha['DATA_NASCIMENTO'];
			$array[] = $linha['CEP'];
			$array[] = $linha['ENDERECO'];
			$array[] = $linha['BAIRRO'];
			$array[] = $linha['CIDADE'];
			$array[] = $linha['UF'];
			$array[] = $linha['NUMERO'];
			$array[] = $linha['SEXO'];
			$array[] = $linha['PAIS'];
			$array[] = $linha['IRMAOS_QTDE'];
			$array[] = $linha['IRMAOS_NOME'];
			$array[] = $linha['ROTEIRO'];
			$array[] = $linha['PESSOAS_AUTORIZADAS'];
			$array[] = $linha['COD_TIPO_CONTATO'];
			$array[] = $linha['SITUACAO'];
			$array[] = base64_encode($linha['FOTO']);
			$array[] = $linha['OBS'];
			$array[] = $linha['COD_EMPRESA'];
			$array[] = $linha['COD_FILIAL'];
			$array[] = $linha['COMPLEMENTO'];
			$array[] = $linha['CODIGO'];
		}
		session_start();
				$_SESSION["dados"] = $array;
		header("Location: alunoModificado.php");
	}
?>
