<?php
    include 'validaAcesso.php';
?>

<?php 
	
if (isset($_GET['dataInicial'])){
    $dataInicial = $_GET['dataInicial'];
    $dataFinal = $_GET['dataFinal'];
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
    
    $contador = array();
    
   $naoConseguiu = 0;
   $ajudaTotal = 0;
   $ajudaParcial = 0;
   $independete = 0;
    $i = 0;
    $sql = " select  case  
                                     when(FLAG_REALIZOU) = 0 then 'Não conseguiu realizar'  
                                      when(FLAG_REALIZOU) = 1 then 'Realizou com ajuda total' 
                                     when(FLAG_REALIZOU) = 2 then 'Realizou com ajuda parcial' 
                                     when(FLAG_REALIZOU) = 3 then 'Realizou independente' end as Caso 
                                      ,count(e.FLAG_REALIZOU) as TOTAL_SEPARADO  from esc_agenda_diaria e 
                                     where DATA BETWEEN  '$dataInicial' and '$dataFinal'
                                     
                                     group by  e.FLAG_REALIZOU order by e.FLAG_REALIZOU;";
            
    $resultado = mysql_query($sql);
    while ($row = mysql_fetch_object($resultado)) {
         $caso = $row->Caso;
         $total = $row->TOTAL_SEPARADO;
         $lista[$i] = $caso;
         $dena[$i] = $total;
         $i = $i + 1;
}
mysql_close($con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Agenda Grafico</title>
</head>
	<meta charset="UTF-8" />
        
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
	<meta name="robots" content="all, index, follow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>EPC - Espaço Paula Calado</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
               <link type="text/css" href="jquery/css/base/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<!--		<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>-->
<!--		<script type="text/javascript" src="js_file/form.js"></script>-->
        
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
	<script type="text/javascript" src="jquery/js/jquery-ui-1.9.2.custom.min.js"></script>
         <script type="text/javascript" src="js_file/form.js"></script>
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
                    $ajudaParcial = $dena[$i];
         ?>
         ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[0]?>'],
           <?php 
            }
            elseif ($lista[$i] == "Realizou com ajuda total") {
                $ajudaTotal = $dena[$i];
        ?>
         ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[1]?>'],
         <?php
            }
            elseif ($lista[$i] == "Não conseguiu realizar" ) {
                $naoConseguiu = $dena[$i];
         ?>
          ['<?php echo $lista[$i]?>',<?php echo $dena[$i]?>,'<?php echo $cor[2]?>'],
         <?php
            }
            elseif ($lista[$i] == "Realizou independente") {
                $independete = $dena[$i];
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
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script type="text/javascript">
                document.getElementById('btn').onclick = function() {
                window.print();
        };
          </script>
<body>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
                   
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
                       
                        <a href="relatorioAgendaGrafico.php" style="text-decoration: none;">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU RELATÓRIOS</button>
			</a><br><br>
	<br>
	<div>
		<h2 align="center">Relatório Agenda Diária (Gráfico)</h2>
	</div>
	<br>
        <div id="sua_div">
        <div align="center">
           <table border="1">
                <tr >
                    <th style="background-color:#FF0000; color: #FF0000;">RED</th>
                    <th> &nbsp; 
                        <?php 
                            if($naoConseguiu == 0) {
                                echo $naoConseguiu;
                            }elseif($naoConseguiu != 0){
                                echo $naoConseguiu;
                            }
                        ?> - NÃO CONSEGUIU REALIZAR
                    </th>
                </tr>
                <tr >
                    <th style="background-color:#04B404; color: #04B404;">RED</th>
                    <th> &nbsp; 
                        <?php
                           if($ajudaTotal == 0) {
                                echo $ajudaTotal;
                            }elseif($ajudaTotal != 0){
                                echo $ajudaTotal;
                            } 
                        ?> - REALIZOU COM AJUDA TOTAL
                    </th>
                </tr>
                <tr >
                    <th style="background-color:#D7DF01; color: #D7DF01;">RED</th>
                    <th> &nbsp; 
                        <?php 
                            if($ajudaParcial == 0) {
                                echo $ajudaParcial;
                            }elseif($ajudaParcial != 0){
                                echo $ajudaParcial;
                            } 
                        ?> - REALIZOU COM AJUDA PARCIAL
                    </th>
                </tr>
                <tr >
                    <th style="background-color:#013ADF; color: #013ADF;">RED</th>
                    <th> &nbsp; 
                        <?php 
                            if($independete == 0) {
                                echo $independete;
                            }elseif($independete != 0){
                                echo $independete;
                            } 
                        ?> - REALIZOU INDEPENDENTE
                    </th>
                </tr>
            </table>
        </div>
        <div align="center">
        <div id="columnchart_values" style="width: 900px; height: 300px; margin-bottom: 20%;"></div>
        </div>
            <button id="btn">Clique para imprimir</button>
        </div>
        <div align="center">
            <form action="processaImprimirAgendaGrafico.php" method="post">
                <input type="hidden" name="dataInicial" value="<?php echo $dataInicial;?>">
                <input type="hidden" name="dataFinal" value="<?php echo $dataFinal;?>">
                <button type="submit" class="btn btn-primary btn-lg btn3d">IMPRIMIR</button>
            </form>
        </div>
        <br>
        
    <?php 
	include 'rodape.php';
    ?>
        
        

        <script>
        document.getElementById('btn').onclick = function() {
            var conteudo = document.getElementById('sua_div').innerHTML,
                tela_impressao = window.open('about:blank');

            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        };
        </script>  
</div>
</td>
</tr>
</table>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$("#dataInicial").mask("99/99/9999");
		$("#dataFinal").mask("99/99/9999");		
	});
</script>
    <?php
}
else{
    header("Location: index.php");
}
    ?>
</body>
</html>
