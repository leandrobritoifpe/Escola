<?php
	include_once 'conectaBanco.php';
	$con = abrirConexao();
	mysql_set_charset('UTF8', $con);
	
	//$nomeAluno = $_POST['aluno'];
	
	if (isset($_POST["codigoAluno"])) {
		$codigo = $_POST['codigoAluno'];
		$consulta_cod = "select codigo from esc_cad_aluno_capa where codigo = '$codigo'";// minha consulta
		$resultado = mysql_query($consulta_cod);
		$cont = 0;
		//echo "1";
		//echo $codigo;
		while ($linha = mysql_fetch_array($resultado)) {
			$cont = $cont + 1;;
		}
		$vetor=array();
		$cod ="";
		if ($cont != 0){
			$vetor[] = $codigo;
			session_start();
				$_SESSION["teste"] = $vetor;
				
			header("Location: alunoConsultado.php");
		}
		else{
			echo "<script>window.location='cadastroAluno.php';alert('CODIGO DO ALUNO NÃO ENCONTRADO');</script>";
		}
		
	}
	elseif(isset($_POST["nomeAluno"])){
		$nomeAluno = $_POST['nomeAluno'];
		$nomeAluno = strtoupper($nomeAluno);
		echo $sql = "select * from esc_cad_aluno_capa where nome like '%$nomeAluno%'";
		$resultado = mysql_query($sql);
		$cont = 0;
		while ($linha = mysql_fetch_array($resultado)) {
			$cont = $cont +1;
		}
		if ($cont != 0) {
			header("Location: alunoConsultadoNome.php?nome=$nomeAluno");
		}
		else{
			echo "<script>window.location='cadastroAluno.php';alert('NENHUM ALUNO ENCONTRADO COM ESSE NOME');</script>";
		}
	}
	else{
		header("Location: index.php");
	}
?>