
<?php
    include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
    $lista = array();
    $dena = array();
    $cor= array();
    $cor[0] = '#D7DF01'; //amarelo
    $cor[1] = '#04B404'; //verde
    $cor[2] = '#FF0000'; //vermelho
    $cor[3] = '#013ADF'; //azul
    
    $dataIni = "2016-05-05";
    $dataFini = "2016-06-15";
    $i = 0;
    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '2016-05-05' and '2016-06-15'
                                     
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
            
    $resultado = mysql_query($sql);
    while ($row = mysql_fetch_object($resultado)) {
         $caso = $row->Caso;
         $total = $row->TOTAL_SEPARADO;
         $lista[$i] = $caso;
         $dena[$i] = $total;
         $i = $i + 1;
}
mysql_close();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
  
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "TOTAL", { role: "style" } ],
        <?php
            $k = $i;
            for ($i = 0; $i < $k; $i++) {
                if($lista[$i] == "Realizou com ajuda parcial") {
         ?>
         ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[0]?>'],
           <?php 
            }
            elseif ($lista[$i] == "Realizou com ajuda total") {
        ?>
         ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[1]?>'],
         <?php
            }
            elseif ($lista[$i] == "Não conseguiu realizar" ) {
         ?>
          ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[2]?>'],
         <?php
            }
            elseif ($lista[$i] == "Realizou independente") {
         ?>
          ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[3]?>'],
         <?php
            }}
         ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "RELÁTORIO AGENDA DIÁRIA GRÁFICO",
        width: 800,
        height: 500,
        bar: {groupWidth: "40%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
    <body>
        <div>TODO write content</div>
    </body>
</html>
