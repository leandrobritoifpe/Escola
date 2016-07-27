<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Relatório</title>
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
<?php 
	if (isset($_SESSION["datas"])){
		//$id = $_GET["cod"];
		$datas = $_SESSION["datas"];
                $dataInicial = "";
                 $dataFinal = "";
		for($posicao1 = 0; $posicao1 < 2 ; $posicao1++) {
                    $dataInicial = $datas[$posicao1];
                    $dataFinal = $datas[$posicao1 + 1];
                    $posicao1++;
                }
                //echo $dataInicial;
                //echo $dataFinal;
                
	include_once 'conectaBanco.php';
	$con = abrirConexao();
	mysql_set_charset('UTF8', $con);
		
            $sql= mysql_query("select m.DATAHORA,  f.NOME AS 'ALUNO', a.NOME AS 'PROFESSOR',m.RECNO from  esc_rel_fechamento_mensal m
            left join cad_funcionario f on m.USUARIO = f.COD_USUARIO
            left join esc_cad_aluno_capa a on m.ALUNO = a.CODIGO
            where m.DATAHORA BETWEEN('$dataInicial') and ('$dataFinal')");
				
?>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
                        <a href="relatorioFechamentoMensal.php">
				<button class="btn btn-lg btn-primary btn-block" type="submit">FECHAMENTO MENSAL</button>
			</a><br><br>
	<table id='tabela' border='1'>
	<thead>
		<tr style='background-color: #0080FF;;'>
		 	<th style='width: 10%;color : black'>DATA</th>
			<th style='width: 20%;color : black'>PROFESSOR</th>
<!--		 	<th style='width: 10%;'>DISSERTA��O</th>-->
		 	<th style='width: 20%;color : black'>ALUNO</th>
			<th style='width: 5%;color : black'>OPCOES</th>
	 	</tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($sql)) {	
?>
	 <tr>
	 	<td align="left" style="color : black"><?php echo date('d/m/Y', strtotime($linha['DATAHORA'])); ?></td>
	 	<!-- PEGANDO DATA COM NOME AMERICACO -->
	 	<!--<td align="center" style="color : black"><?php //echo date_format(new DateTime($query['data']), "d/M/Y");); ?></td>
	 	-->
                <td align="left" style="color : black"><?php echo $linha['ALUNO']?></td>
	 	<td align="left" style="color : black"><?php echo $linha['PROFESSOR']?></td>
	 	<td align="center">
			<!--<form action="teste.php" method="post">
				<input type="hidden" name="codigo" value="<?php echo $linha['CODIGO']?>">
				<button class="btn btn-info" type="submit">Ver</button>
			</form>
		-->
                <a target="_blanck" href="impremeFechamentoMensal.php?recno=<?php echo $linha['RECNO']?>"><button class="btn btn-info" type="submit">Ver</button></a>
		</td>
	 </tr>
	<?php } mysql_close($con);?>
</table>
<br><br>
<?php 
	include 'rodape.php';
?>
</div>
</td>
</tr>
</table>
</div>
<?php }else{
	header("Location: relatorio_filtro.php");
}
?>
</body>
</html>


