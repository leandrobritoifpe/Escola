<?php 
	session_start();

	if (isset($_SESSION["USUARIO"])) {
		$nome = $_SESSION["USUARIO"];
		$cpf = $_SESSION["CPF"];
		$codigo  = $_SESSION["CODIGO"];
		$empresa = $_SESSION["EMPRESA"];
		$filial = $_SESSION["FILIAL"];
	}
	else {
		header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>EPC - Espa&ccedil;o Paula Calado</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js_file/validaCpf.js"></script>
	<script type="text/javascript" src="js_file/buscarCep.js"></script>
	<script type="text/javascript" src="js_file/escondeCadastro.js"></script>
	<script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
	
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
		if (isset($_GET["nome"])){	
			echo $nomeAluno = $_GET['nome'];
			include_once 'conectaBanco.php';
			$con = abrirConexao();
			mysql_set_charset('UTF8', $con);
			
	?>
	<br><br>
	<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
			<a href="cadastros.php">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU - CADASTROS</button>
			</a><br><br>

		<table id='tabela' border="1">
			<thead style="color: white;" align="center">
				<tr style='background-color: blue;' align="center">
					<th style='width: 5%; color: black;' align="center">CODIGO</th>
					<th style='width: 10%; color: black;' align="center">DATA NASCIMENTO</th>
					<th style='width: 25%; color: black;' align="center">NOME</th>
					<!--		 	<th style='width: 10%;'>DISSERTAÇÃO</th>-->
					<th style='width: 10%; color: black;' align="center">CPF</th>
					<th style='width: 10%; color: black;' align="center">RG</th>
					<th style='width: 5%; color: black;' align="center">OPCOES</th>
				</tr>
			</thead>
			<?php	
		//$cont =  0;
		$sql = mysql_query("select CODIGO,DATA_NASCIMENTO,NOME,CPF,RG from esc_cad_aluno_capa where NOME like '%$nomeAluno%'");
		while ($linha = mysql_fetch_array($sql)) {	
?>
			<tr>
				<td align="center" style="color: black"><?php echo $linha['CODIGO']?></td>
				<td align="center" style="color: black"><?php echo date('d/m/Y', strtotime($linha['DATA_NASCIMENTO'])); ?></td>
				<!-- PEGANDO DATA COM NOME AMERICACO -->
				<!--<td align="center" style="color : black"><?php //echo date_format(new DateTime($query['data']), "d/M/Y");); ?></td>
	 	-->
				<td align="left" style="color: black"><?php echo $linha['NOME']?></td>
				<td align="left" style="color: black"><?php echo $linha['CPF']?></td>
				<td align="left" style="color: black"><?php echo $linha['RG']?></td>
				<td align="center"><!--<form action="teste.php" method="post">
				<input type="hidden" name="codigo" value="<?php echo $linha['CODIGO']?>">
				<button class="btn btn-info" type="submit">Ver</button>
			</form>
		--> 
				<form action="processaConsultaAluno.php" method="post">
				<input type="hidden" name="codigoAluno"
					value="<?php echo $linha['CODIGO']?>">
				<button class="btn btn-info" type="submit">Ver</button>
				</form>
				</td>
			</tr>
			<?php }?>
		</table>
		<br><br>

			<?php 
				include 'rodape.php';
			?>
		</div><!-- /container -->
		</td></tr>
		</table>
		</div>
		<br><br><br>
		<?php 
			}
			else {
				header("Location: index.php");
			}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#irmaos').numeric();
				$('#codigoAluno').numeric();
				$("#cpf").mask("999.999.999-99");
				$("#cep").mask("99999-999");	
			});
		</script>
	</body>
</html>
