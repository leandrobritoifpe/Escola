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
               $cont = 0;
               
               if ($professor == "todos" && $disciplina == "todos") {
                    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '$dataInicial' and '$dataFinal'                              
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
                    $resultado = mysql_query($sql);
                    if ($resultado) {
                        while ($linha = mysql_fetch_array($resultado)) {
					$cont = $cont + 1;	
					//echo "entrou no while";
				}
                                if ($cont != 0) {
                                    mysql_close();
                                    header("Location: exibeRelatorioAgedaGrafData.php?dataInicial=$dataInicial&dataFinal=$dataFinal");
                                }
                                elseif ($cont == 0) {
                                     mysql_close();
                                    echo "<script>window.location='relatorioAgendaGrafico.php';alert('NÃO HÁ REGISTROS');</script>";
                            }
                    }
                    
                   
               }
               elseif ($professor == "todos" && $disciplina != "todos") {
                   echo "entrou 2";
                    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '$dataInicial' and '$dataFinal' 
                                        and cod_disciplina = '$disciplina'
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
                    $resultado = mysql_query($sql);
                    if ($resultado) {
                         while ($linha = mysql_fetch_array($resultado)) {
                              $cont = $cont + 1;	
                            }
                            if ($cont != 0) {
                                 mysql_close();
                                header("Location: exibeRelatorioAgendaGrafDisc.php?disciplina=$disciplina&dataInicial=$dataInicial&dataFinal=$dataFinal");
                            }
                             elseif ($cont == 0) {
                                  mysql_close();
                                    echo "<script>window.location='relatorioAgendaGrafico.php';alert('NÃO HÁ REGISTROS');</script>";
                            }
                    } 
           }
           elseif ($professor != "todos" && $disciplina == "todos") {
                   echo "entrou 3";
                    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '$dataInicial' and '$dataFinal' 
                                        and cod_professor = '$professor'
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
                    $resultado = mysql_query($sql);
                    if ($resultado) {
                         while ($linha = mysql_fetch_array($resultado)) {
                              $cont = $cont + 1;	
                            }
                            if ($cont != 0) {
                                 mysql_close();
                                header("Location: exibeRelatorioAgendaGrafProf.php?professor=$professor&dataInicial=$dataInicial&dataFinal=$dataFinal");
                            }
                             elseif ($cont == 0) {
                                  mysql_close();
                                    echo "<script>window.location='relatorioAgendaGrafico.php';alert('NÃO HÁ REGISTROS');</script>";
                            }
                    } 
           }
           elseif ($professor != "todos" && $disciplina != "todos") {
                   echo "entrou 3";
                    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '$dataInicial' and '$dataFinal' 
                                        and cod_professor = '$professor'
                                        and cod_disciplina = '$disciplina'
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
                    $resultado = mysql_query($sql);
                    if ($resultado) {
                         while ($linha = mysql_fetch_array($resultado)) {
                              $cont = $cont + 1;	
                            }
                            if ($cont != 0) {
                                 mysql_close();
                                header("Location: exibeRelatorioAgendaGrafProfDisc.php?professor=$professor&dataInicial=$dataInicial&dataFinal=$dataFinal&disciplina=$disciplina");
                            }
                             elseif ($cont == 0) {
                                  mysql_close();
                                    echo "<script>window.location='relatorioAgendaGrafico.php';alert('NÃO HÁ REGISTROS');</script>";
                            }
                    } 
           }
              
    }
?>