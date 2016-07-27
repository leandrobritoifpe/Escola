<?php 
	
	if(isset($_POST["dataInicial"])){

		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
                
		$professor = $_POST['professor'];
		$disciplina = $_POST['disciplina'];
                
                function date_converter($_date = null) {
                    $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
                    if ($_date != null && preg_match($format, $_date, $partes)) {
                        return $partes[3].'-'.$partes[2].'-'.$partes[1];
                    }
                    return false;
                }
               $dataInicial = date_converter($_POST['dataInicial']);
               $dataFinal = date_converter($_POST['dataFinal']);
               $realizacao = $_POST['realizacao'];
               
               echo $realizacao;
//Mostra o Resultado
		
		$cont = 0;
		/*echo $dataFinal;
		echo $dataInicial;
		echo $professor;
		echo $disciplina;*/
		
		if ($professor == "todos" && $disciplina == "todos" && $realizacao == ""){
			echo "entrou no if 1";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal')";
			$resultado = mysql_query($sql);
			if ($resultado){
				echo "entrou no sql";
				while ($linha = mysql_fetch_array($resultado)) {
					$cont = $cont + 1;	
					//echo "entrou no while";
				}
				if ($cont != 0) {
					//echo "entrou no segundo if";
					header("Location: exibeRelatorioData.php?dataInicial=$dataInicial&dataFinal=$dataFinal&realizacao=$realizacao");
				}
				elseif ($cont == 0){
					echo "<script>window.location='relatorio_filtro.php';alert('N�O H� REGISTROS');</script>";
				}
			}
                        
		}
		elseif ($professor == "todos" && $disciplina != "todos" && $realizacao == ""){
                    echo "entrou no if 2";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_disciplina = '$disciplina'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataDisc.php?dataInicial=$dataInicial&dataFinal=$dataFinal&disciplina=$disciplina&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('N�O H� REGISTROS');</script>";
					}
				}
		}
		elseif ($professor !="todos" && $disciplina == "todos" && $realizacao == ""){
                     echo "entrou no if 3";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_professor = '$professor'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataProf.php?dataInicial=$dataInicial&dataFinal=$dataFinal&professor=$professor&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTROS');</script>";
					}
				}
		}
		elseif($professor != "todos" && $disciplina != "todos" && $realizacao == ""){
                     echo "entrou no if 4";
			$sql="select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_disciplina = '$disciplina' and cod_professor = '$professor'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorio.php?dataInicial=$dataInicial&dataFinal=$dataFinal&professor=$professor&disciplina=$disciplina&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTROS');</script>";
					}
				}
		}
        elseif ($professor == "todos" && $disciplina == "todos" && $realizacao != ""){
            echo "entrou no fi 4";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_disciplina = '$disciplina' and flag_realizou = '$realizacao'";
			$resultado = mysql_query($sql);
				if ($resultado){
					echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataDisc.php?dataInicial=$dataInicial&dataFinal=$dataFinal&disciplina=$disciplina&realizacao=$realizao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTROS');</script>";
					}
				}
		}
                elseif ($professor == "todos" && $disciplina != "todos" && $realizacao != ""){
                     echo "entrou no if 5";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_disciplina = '$disciplina' and flag_realizou = '$realizacao'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataDisc.php?dataInicial=$dataInicial&dataFinal=$dataFinal&disciplina=$disciplina&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTROS');</script>";
					}
				}
		}
                elseif ($professor !="todos" && $disciplina == "todos" && $realizacao != ""){
                     echo "entrou no if 6";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_professor = '$professor' and flag_realizou = '$realizacao'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataProf.php?dataInicial=$dataInicial&dataFinal=$dataFinal&professor=$professor&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTRO');</script>";
					}
				}
		}
                elseif ($professor !="todos" && $disciplina != "todos" && $realizacao != ""){
                     echo "entrou no if 7";
			$sql= "select esc_agenda_diaria.CODIGO,esc_agenda_diaria.DATA,esc_agenda_diaria.LOCAL,esc_agenda_diaria.DISSERTACAO,esc_agenda_diaria.DIFICULDADES, esc_cad_disciplina.DESCRICAO AS 'DISCIPLINA',esc_cad_aluno_capa.NOME as 'ALUNO', cad_funcionario.NOME as 'PROFESSOR'from esc_agenda_diaria left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO where data_hora between ('$dataInicial')and ('$dataFinal') and cod_professor = '$professor' and flag_realizou = '$realizacao'";
			$resultado = mysql_query($sql);
				if ($resultado){
					//echo "entrou no sql";
					while ($linha = mysql_fetch_array($resultado)) {
						$cont = $cont + 1;	
						//echo "entrou no while";
					}
					if ($cont != 0) {
						//echo "entrou no segundo if";
						header("Location: exibeRelatorioDataProf.php?dataInicial=$dataInicial&dataFinal=$dataFinal&professor=$professor&realizacao=$realizacao");
					}
					elseif ($cont == 0){
						echo "<script>window.location='relatorio_filtro.php';alert('NÃO HÁ REGISTRO');</script>";
					}
				}
		}
        }else{
                    header("Location: relatorio_filtro.php");
	}
	
//	select esc_agenda_diaria.*, esc_cad_disciplina.DESCRICAO AS DISCIPLINA, 
//esc_cad_aluno_capa.NOME as ALUNO, cad_funcionario.NOME as PROFESSOR 
//from esc_agenda_diaria 
//left join esc_cad_disciplina on esc_agenda_diaria.COD_DISCIPLINA = esc_cad_disciplina.CODIGO 
//left join esc_cad_aluno_capa on esc_agenda_diaria.COD_ALUNO = esc_cad_aluno_capa.CODIGO 
//left join cad_funcionario on esc_agenda_diaria.COD_PROFESSOR = cad_funcionario.CODIGO

?>