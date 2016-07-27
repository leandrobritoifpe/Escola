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
	if (isset($_GET["professor"])){
		//$id = $_GET["cod"];
		$dataInicial = $_GET['dataInicial'];
		$dataFinal = $_GET['dataFinal'];
		$professor = $_GET['professor'];
		$disciplina = $_GET['disciplina'];
		
	include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		$sql = mysql_query("select d.CODIGO,d.DATA,d.LOCAL,d.DISSERTACAO,d.DIFICULDADES, p.DESCRICAO AS 'DISCIPLINA', 
							f.NOME as 'ALUNO', s.NOME as 'PROFESSOR' 
							from esc_agenda_diaria d 
							left join esc_cad_disciplina p on d.COD_DISCIPLINA = p.CODIGO 
							left join esc_cad_aluno_capa f on d.COD_ALUNO = f.CODIGO 
							left join cad_funcionario s on d.COD_PROFESSOR = s.CODIGO
							where d.data_hora between ('$dataInicial')and ('$dataFinal') and d.cod_disciplina = '$disciplina' and 
							cod_professor = '$professor'");
		
//		echo "select d.CODIGO,d.DATA,d.LOCAL,d.DISSERTACAO,d.DIFICULDADES, p.DESCRICAO AS 'DISCIPLINA', 
//							f.NOME as 'ALUNO', s.NOME as 'PROFESSOR' 
//							from esc_agenda_diaria d 
//							left join esc_cad_disciplina p on d.COD_DISCIPLINA = p.CODIGO 
//							left join esc_cad_aluno_capa f on d.COD_ALUNO = f.CODIGO 
//							left join cad_funcionario s on d.COD_PROFESSOR = s.CODIGO
//							where d.data_hora between ('$dataInicial')and ('$dataFinal') and d.cod_disciplina = '$disciplina' and 
//							cod_professor = '$professor'"
?>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
                        <a href="relatorio_filtro.php">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU RELATÓRIO</button>
			</a><br><br>
	<table id='tabela' border='1'>
	<thead style="color: white;">
		<tr style='background-color: #0080FF;'>
			<th style='width: 5%; color : black'>CODIGO</th>
		 	<th style='width: 10%;color : black'>DATA</th>
			<th style='width: 15%;color : black'>LOCAL</th>
<!--		 	<th style='width: 10%;'>DISSERTA��O</th>-->
		 	<th style='width: 10%;color : black'>DISCIPLINA</th>
		 	<th style='width: 25%;color : black'>ALUNO</th>
			<th style='width: 25%;color : black'>PROFESSOR</th>
			<th style='width: 25%;color : black'>OPCOES</th>
	 	</tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($sql)) {	
?>
	 <tr>
	 	<td align="center" style="color : black"><?php echo $linha['CODIGO']?></td>
	 	<td align="center" style="color : black"><?php echo date('d/m/Y', strtotime($linha['DATA'])); ?></td>
	 	<!-- PEGANDO DATA COM NOME AMERICACO -->
	 	<!--<td align="center" style="color : black"><?php //echo date_format(new DateTime($query['data']), "d/M/Y");); ?></td>
	 	-->
	 	<td align="center" style="color : black"><?php echo $linha['LOCAL']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['DISCIPLINA']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['ALUNO']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['PROFESSOR']?></td>
	 	<td align="center">
			<!--<form action="teste.php" method="post">
				<input type="hidden" name="codigo" value="<?php echo $linha['CODIGO']?>">
				<button class="btn btn-info" type="submit">Ver</button>
			</form>
		-->
		<a target="_blanck" href="teste.php?cod=<?php echo $linha['CODIGO']?>"><button class="btn btn-info" type="submit">Ver</button></a>
		</td>
	 </tr>
	<?php }?>
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