<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Relatorio</title>
</head>
	<meta charset="UTF-8" />
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
<!--		<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>-->
<!--		<script type="text/javascript" src="js_file/form.js"></script>-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="js/jquery.alphanumeric.js"></script>
	<script type="text/javascript" src="js_file/form.js"></script>
<body>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
			<a href="home.php" style="text-decoration: none;">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU PRINCIPAIS</button>
			</a><br><br>
	<br>
	<div>
		<h2 align="center">Menu de Relatórios</h2>
	</div>
	<br>
        <div class="main clearfix">
		<div class="container">
                    <div class="row">
			<div class="col-md-3 col-sm-4 col-xs-6">
                            <a href="relatorio_filtro.php">
                                <img class="img-responsive" src="IMAGE/relatorios2.png"/><br>
                            </a>
                            <a href="relatorio_filtro.php" class="links" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relatório Agenda Diária</a>
			</div>
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <a href="relatorioFechamentoMensal.php">
                                <img class="img-responsive" src="IMAGE/realtorios3.png"/><br>
                            </a>
                            <a href="relatorioFechamentoMensal.php" class="links" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Relatório Fechamento Mensal</a>
                       </div>
                       <div class="col-md-3 col-sm-4 col-xs-6">
                           <a href="relatorioAgendaGrafico.php">
                               <img class="img-responsive" src="IMAGE/grafico.png"/><br>
                           </a>
                           <a href="relatorioFechamentoMensal.php" class="links" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Agenda Diaria Gráfico</a>
                       </div>
                    </div>
                </div>
        </div>
    <?php 
	include 'rodape.php';
    ?>
</div>
</td>
</tr>
</table>
</div>
<!--<script type="text/javascript">
	
	$(document).ready(function(){
		$("#dataInicial").mask("99/99/9999");
		$("#dataFinal").mask("99/99/9999");		
	});
</script> 
--></body>
</html>
