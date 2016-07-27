<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Relatório</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>EPC - EspaÃ§o Paula Calado</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js_file/teste.js"></script>
</head>
<body>
<div style="padding: 3%;">	
	<table id='tabela' border='1'>
	<thead style="color: w;">
		<tr style='background-color: blue;'>
			<th style='width: 5%; color : black'>CODIGO</th>
		 	<th style='width: 25%;color : black'>NOME</th>
			<th style='width: 15%;color : black'>CPF</th>
		 	<th style='width: 10%;color : black'>RG</th>
			<th style='width: 5%;color : black'>OPCOES</th>
	 	</tr>
	 </thead>

<?php 
	
    $teste =$_SESSION["alunoVetor"]; 						    								 
    for($posicao1 = 0; $posicao1 < count($teste); $posicao1++) {
?>
<tr>
	<td align="center"><?php echo $teste[$posicao1];?></td>
	<td align="center"> <?php echo $teste[$posicao1 + 1];?></td>
	<td align="center"> <?php echo $teste[$posicao1 + 2];?></td>
	<td align="center"> <?php echo $teste[$posicao1 + 3];?></td>
	<td align="center">
		<a target="_blanck" href="teste.php?cod=<?php echo $linha['CODIGO']?>"><button class="btn btn-info" type="submit">Ver</button>
	</td>
</tr>
<?php  $posicao1 = $posicao1 + 3;}?>
</table>
</div>
</body>
</html>