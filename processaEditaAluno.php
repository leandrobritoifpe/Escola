<?php 
	if (isset($_POST["codigoEditaAuno"])) {
		
		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		$origens = array('"',"'",'/','*','true','false','=','where','drop','delete','from','WHERE','DELETE','FROM','DROP','SELECT');
		$distino = "";
		$codigo = $_POST['codigoEditaAuno'];
		
		 $empresa = $_POST['empresa'];
		 $filial = $_POST['filial'];
		 $nome = str_replace($origens, $distino, $_POST['nome']);
		 $cpf = $_POST['cpf'];
		 $rg = $_POST['rg'];
		 $dataNasc = $_POST['dataNasc'];
		 $cep = $_POST['cep'];
		 $rua = str_replace($origens, $distino, $_POST['rua']);
		 $bairro = str_replace($origens, $distino, $_POST['bairro']);
		 $cidade = str_replace($origens, $distino, $_POST['cidade']);
		 $uf = str_replace($origens, $distino, $_POST['uf']);
		 $pessoas = str_replace($origens, $distino, $_POST['pessoas']);
		 $roteiro = str_replace($origens, $distino, $_POST['roteiro']);
		 $sexo = $_POST['sexo'];
		 $pais = $_POST['pais'];
		 $irmaos = $_POST['irmaos'];
		 $tipoContato = $_POST['tipoContato'];
		 $situacao = $_POST['situacao'];
		 $obs = str_replace($origens, $distino, $_POST['obs']);
		 $numero = $_POST['numero'];
		 $nomeIrmaos = str_replace($origens, $distino, $_POST['nomeIrmaos']);
		
		//RECEBENDO A IMAGEM
		$foto = $_FILES['foto']['tmp_name'];
		$tamanho = $_FILES['foto']['size'];
		$tipo = $_FILES['foto']['type'];
		
		/*$cont = 0;
		$cont2 = 0;
		$cont3 = 0;*/
		echo $complemento = str_replace($origens, $distino, $_POST['complemento']);
		$codCliente = "";
		
		if ($foto == "") {
			/*$sql = mysql_query("select max(cast(codigo as decimal)) as codigo from esc_cad_aluno_capa");
			while ($linha = mysql_fetch_array($sql)) {
				$codCliente = $linha['codigo'];
			}*/
			//$codigoInsert = $codCliente + 1;
			/*$codCliente = $codCliente + 1;
			$insert = mysql_query("insert into esc_cad_aluno_capa ()");*/
			//$data = date('Y-m-d H:i:s');
			$insert = "update esc_cad_aluno_capa set NOME = '$nome',CPF = '$cpf',RG = '$rg',DATA_NASCIMENTO = '$dataNasc',
			SEXO = '$sexo',ENDERECO = '$rua',NUMERO = '$numero',BAIRRO = '$bairro',CIDADE = '$cidade',UF = '$uf',PAIS = '$pais',CEP = '$cep',ROTEIRO = '$roteiro',PESSOAS_AUTORIZADAS = '$pessoas',
			IRMAOS_NOME = '$nomeIrmaos',OBS = '$obs',COD_TIPO_CONTATO = '$tipoContato',COD_EMPRESA = '$empresa',COD_FILIAL = '$filial',IRMAOS_QTDE = '$irmaos',SITUACAO = '$situacao', 
			COMPLEMENTO = '$complemento' where CODIGO = '$codigo'";
			
			$result = mysql_query($insert);
			mysql_close($con);
			
			if ($result) {
				echo "<script>window.location='cadastroAluno.php';alert('ALUNO $codigo ATUALIZADO COM SUCESSO');</script>";
				;
			}
			else{
				echo "<script>window.location='cadastroAluno.php';alert('ERRO AO ATUALIZAR ALUNO');</script>";
			}
		}
	elseif ($foto != "") {
			$fp = fopen($foto,"rb");
			$conteudo = fread($fp, $tamanho);	
			$conteudo = addslashes($conteudo);
			fclose($fp);
			while ($linha = mysql_fetch_array($sql)) {
				$codCliente = $linha['codigo'];
			}
			/*$codCliente = $codCliente + 1;
			$insert = mysql_query("insert into esc_cad_aluno_capa ()");*/
			//$data = date('Y-m-d H:i:s');*/
			$insert =  "update esc_cad_aluno_capa set NOME = '$nome',CPF = '$cpf',RG = '$rg',DATA_NASCIMENTO = '$dataNasc',
			SEXO = '$sexo',ENDERECO = '$rua',NUMERO = '$numero',BAIRRO = '$bairro',CIDADE = '$cidade',UF = '$uf',PAIS = '$pais',CEP = '$cep',ROTEIRO = '$roteiro',PESSOAS_AUTORIZADAS = '$pessoas',
			IRMAOS_NOME = '$nomeIrmaos',OBS = '$obs',COD_TIPO_CONTATO = '$tipoContato',COD_EMPRESA = '$empresa',COD_FILIAL = '$filial',IRMAOS_QTDE = '$irmaos',SITUACAO = '$situacao',FOTO = '$conteudo', 
			COMPLEMENTO = '$complemento' where CODIGO = '$codigo'";
			
			$result = mysql_query($insert);
			mysql_close($con);
			if ($result) {
				echo "<script>window.location='cadastroAluno.php';alert('ALUNO $codigo ATUALIZADO COM SUCESSO2');</script>";
				;
			}
			else{
				echo "<script>window.location='cadastroAluno.php';alert('ERRO TENTAR ATUALIZAR ALUNO');</script>";
				//echo "sql errada2";
			}
		}
		
	}
	else{
		header("Location: index.php");
	}
			
?>