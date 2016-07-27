<?php 
	if (isset($_POST["nome"])) {
		
		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		$origens = array('"',"'",'/','*','true','false','=','where','drop','delete','from','WHERE','DELETE','FROM','DROP','SELECT');
		$distino = "";
		
		$empresa = $_POST['empresa'];
		$filial = $_POST['filial'];
		$nome = strtoupper(str_replace($origens, $distino, $_POST['nome'])) ;
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$dataNasc = $_POST['dataNasc'];
		$cep = $_POST['cep'];
		$rua = strtoupper( str_replace($origens, $distino, $_POST['rua']));
		$bairro = strtoupper(str_replace($origens, $distino, $_POST['bairro']));
		$cidade = strtoupper(str_replace($origens, $distino, $_POST['cidade']));
		$uf = strtoupper(str_replace($origens, $distino, $_POST['uf'])) ;
		$pessoas = strtoupper(str_replace($origens, $distino, $_POST['pessoas'])) ;
		$roteiro = strtoupper(str_replace($origens, $distino, $_POST['roteiro'])) ;
		$sexo = $_POST['sexo'];
		$pais = $_POST['pais'];
		$irmaos = $_POST['irmaos'];
		$tipoContato = $_POST['tipoContato'];
		$situacao = $_POST['situacao'];
		$obs = strtoupper(str_replace($origens, $distino, $_POST['obs']));
		$numero = $_POST['numero'];
		$nomeIrmaos = strtoupper(str_replace($origens, $distino, $_POST['nomeIrmaos']));
		
		//RECEBENDO A IMAGEM
		$foto = $_FILES['foto']['tmp_name'];
		$tamanho = $_FILES['foto']['size'];
		$tipo = $_FILES['foto']['type'];
		
		/*$cont = 0;
		$cont2 = 0;
		$cont3 = 0;*/
		$complemento = strtoupper(str_replace($origens, $distino, $_POST['complemento']));
		$codCliente = "";
		
		if ($foto == "") {
			$sql = mysql_query("select max(cast(codigo as decimal)) as codigo from esc_cad_aluno_capa");
			while ($linha = mysql_fetch_array($sql)) {
				$codCliente = $linha['codigo'];
			}
			$codigoInsert = $codCliente + 1;
			/*$codCliente = $codCliente + 1;
			$insert = mysql_query("insert into esc_cad_aluno_capa ()");*/
			$data = date('Y-m-d H:i:s');
			echo $insert = "insert into esc_cad_aluno_capa (DATA_CADASTRO,CODIGO,NOME,CPF,RG,DATA_NASCIMENTO,SEXO,ENDERECO,NUMERO,
			BAIRRO,CIDADE,UF,PAIS,CEP,ROTEIRO,PESSOAS_AUTORIZADAS,IRMAOS_NOME,OBS,COD_TIPO_CONTATO,COD_EMPRESA,COD_FILIAL,IRMAOS_QTDE,SITUACAO,COMPLEMENTO) values (CURRENT_TIMESTAMP(),'$codigoInsert','$nome','$cpf','$rg','$dataNasc',
			'$sexo','$rua','$numero','$bairro','$cidade','$uf','$pais','$cep','$roteiro','$pessoas','$nomeIrmaos','$obs','$tipoContato','$empresa','$filial','$irmaos','$situacao','$complemento')";
			
			$result = mysql_query($insert);
			mysql_close($con);
			
			if ($result) {
				echo "<script>window.location='cadastroAluno.php';alert('ALUNO $codigoInsert CADASTRADO COM SUCESSO');</script>";
				;
			}
			else{
				echo "<script>window.location='cadastroAluno.php';alert('ERRO AO CADASTRAR ALUNO');</script>";
			}
		}
	elseif ($foto != "") {
			$fp = fopen($foto,"rb");
			$conteudo = fread($fp, $tamanho);	
			$conteudo = addslashes($conteudo);
			fclose($fp);
			$sql = mysql_query("select max(cast(codigo as decimal)) as codigo from esc_cad_aluno_capa");
			while ($linha = mysql_fetch_array($sql)) {
				$codCliente = $linha['codigo'];
			}
			$codigoInsert = $codCliente + 1;
			/*$codCliente = $codCliente + 1;
			$insert = mysql_query("insert into esc_cad_aluno_capa ()");*/
			$data = date('Y-m-d H:i:s');
			$insert = "insert into esc_cad_aluno_capa (DATA_CADASTRO,CODIGO,NOME,CPF,RG,DATA_NASCIMENTO,SEXO,ENDERECO,NUMERO,
			BAIRRO,CIDADE,UF,PAIS,CEP,ROTEIRO,PESSOAS_AUTORIZADAS,IRMAOS_NOME,OBS,COD_TIPO_CONTATO,COD_EMPRESA,COD_FILIAL,IRMAOS_QTDE,SITUACAO,FOTO,COMPLEMENTO) values (CURRENT_TIMESTAMP(),'$codigoInsert','$nome','$cpf','$rg','$dataNasc',
			'$sexo','$rua','$numero','$bairro','$cidade','$uf','$pais','$cep','$roteiro','$pessoas','$nomeIrmaos','$obs','$tipoContato','$empresa','$filial','$irmaos','$situacao','$conteudo','$complemento')";
			
			$result = mysql_query($insert);
			mysql_close($con);
			if ($result) {
				echo "<script>window.location='cadastroAluno.php';alert('ALUNO $codigoInsert CADASTRADO COM SUCESSO2');</script>";
				;
			}
			else{
				echo "<script>window.location='cadastroAluno.php';alert('ERRO AO CADASTRAR ALUNO');</script>";
				//echo "sql errada2";
			}
		}
		
	}
	else{
		header("Location: index.php");
	}
?>