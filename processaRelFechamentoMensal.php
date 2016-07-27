<?php
   if (isset($_POST["dataInicial"])) {
    include_once 'conectaBanco.php';
    $con = abrirConexao();
    mysql_set_charset('UTF8', $con);
    
   function date_converter($_date = null) {
     $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
      if ($_date != null && preg_match($format, $_date, $partes)) {
          return $partes[3].'-'.$partes[2].'-'.$partes[1];
       }
        return false;
     }
    $dataInicial = date_converter($_POST['dataInicial']);
    $dataFinal = date_converter($_POST['dataFinal']);
    
    $dataInicial =  $dataInicial.' 00:00:00';
    $dataFinal = $dataFinal.' 23:59:59';
    
   echo $sql = "select m.DATAHORA,  f.NOME, a.NOME,m.DISCRITIVO, m.RECNO from  esc_rel_fechamento_mensal m
            left join cad_funcionario f on m.USUARIO = f.COD_USUARIO
            left join esc_cad_aluno_capa a on m.ALUNO = a.CODIGO
            where m.DATAHORA BETWEEN('$dataInicial') and ('$dataFinal')";
   
   $resultado = mysql_query($sql);
   $cont = 0;
   while ($row = mysql_fetch_array($resultado)) {
       $cont  = $cont + 1;
   }
   $vetor  = array();
   if($cont != 0) {
       $vetor[] = $dataInicial;
       $vetor[] = $dataFinal;
       
       session_start();
       $_SESSION["datas"] = $vetor;
       header("Location: exibeFechamentoMensal.php");
   }
}
 else {
    header("Location: relatorioFechamentoMensal.php");
}
?>

