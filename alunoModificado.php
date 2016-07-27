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
	
	</head>
	<body>
	<?php 
		if (isset($_SESSION["dados"])){
			$vetorAluno = $_SESSION["dados"];
			$codigo = "";
			$codContato = "";
			$situacao = "";
			$foto = "";
			$obs = "";
			$empresa = "";
			$filial = "";
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
			<p><button type="submit" class="btn btn-primary btn-lg" id="btConsultar">Consultar</button></p>
			<div id="consulta">
				<form action="processaConsultaAluno.php" method="post">
					<p>
						<label for="codigo"> Codigo do Aluno</label>
						<input type="text" class="txt" name="codigoAluno" id="codigoAluno" size="4" required="required">
						<button type="submit">Buscar</button>
					</p>
				</form>
				<form action="processaConsultaAluno.php" method="post">
					<p>
						<label for="nomeAluno">Nome Do aluno</label>
						<input type="text" style="width: 30%;" name="nomeAluno" required="required">
						<button type="submit">Buscar</button>
					</p>
				</form>
			</div>
			<p><button type="submit" class="btn btn-primary btn-lg" id="btCadastro">Voltar</button></p>
			<div id="formulario">
			<?php 
			for($posicao1 = 0; $posicao1 < 2 ; $posicao1++) {
			?>
			<p><h3>Dados do Aluno</h3></p>
			<form action="processaEditaAluno.php" id="formAluno" method="post" enctype="multipart/form-data">
			  <input type="hidden" value="<?php echo $vetorAluno[$posicao1 + 23]?>" name="codigoEditaAuno">
              <label for="nome" class="obrigatorio">Nome: &nbsp;</label>
              <input type="text" id="nome" name="nome" required="required" maxlength="50" style="width: 30%;" placeholder="Nome Completo" value="<?php echo $vetorAluno[$posicao1];?>">&nbsp;
              <label for="cpf" class="obrigatorio">CPF: &nbsp;</label>
              <input type="text" id="cpf" name="cpf" placeholder="CPF" required="required" maxlength="14" class="15" value="<?php echo $vetorAluno[$posicao1 + 1];?>" onblur="return verificarCPF(this.value);">&nbsp;
              <label for="rg">RG: &nbsp;</label>
              <input type="text" id="rg" name="rg" maxlength="7" class="15" placeholder="RG" size="7" value="<?php echo $vetorAluno[$posicao1 + 2];?>">
              <label for="dataNasc">Data Nascimento:</label>
              <input type="date" id="dataNasc" name="dataNasc" maxlength="14" class="15" value="<?php echo $vetorAluno[$posicao1 + 3];?>"><br><br>
              <label for="cep" class="obrigatorio">CEP: &nbsp;</label>
              <input type="text" id="cep" name="cep" maxlength="14" placeholder="Cep" required="required" size="7" value="<?php echo $vetorAluno[$posicao1 + 4];?>"  class="15" onblur="pesquisacep(this.value);">&nbsp;
              <label for="rua" class="obrigatorio"> Rua: &nbsp;</label>
              <input type="text" required="" placeholder="Rua" name="rua" id="rua" style="width: 20%;" value="<?php echo $vetorAluno[$posicao1 + 5];?>">&nbsp;
			  <label for="bairro" class="obrigatorio"> Bairro: &nbsp;</label>
			  <input type="text" required="required" placeholder="Bairro" name="bairro" id="bairro" class="20" maxlength="30" value="<?php echo $vetorAluno[$posicao1 + 6];?>">&nbsp;                   	
			  <label for="cidade" class="obrigatorio">Cidade: &nbsp;</label>
			  <input type="text" required="" placeholder="Cidade" name="cidade" id="cidade" class="20" maxlength="30" value="<?php echo $vetorAluno[$posicao1 + 7];?>">&nbsp;
			  <label for="uf" class="obrigatorio">UF: &nbsp;</label>
			  <input type="text" required="" placeholder="UF" name="uf"  id="uf" style="width:5%;" maxlength="2" value="<?php echo $vetorAluno[$posicao1 + 8];?>">&nbsp;<br><br>
			  <label for="Numero" class="obrigatorio">Numero &nbsp;</label>
			  <input type="text" required="" placeholder="Numero" size="4" name="numero"  id="numero" class="5" maxlength="8" value="<?php echo $vetorAluno[$posicao1 + 9];?>">&nbsp;
			  <input type="hidden" name="ibge" id="ibge" class="5" readonly="readonly">
			  <label for="Complemento">Complemento:</label>
			  <input type="text" name="complemento" id="complemento" maxlength="15" class="20" value="<?php echo $vetorAluno[$posicao1 + 22]?>">&nbsp; 
			  <label for="sexo">Sexo: &nbsp;</label>
			  <?php 
				if ($vetorAluno[$posicao1 + 10]== 1) {		
			  ?>
			  <select name="sexo" id="sexo">
			  	<option value="1">FEMININO</option>
			  	<option value="0">MASCULINO</option>
			  </select>&nbsp;
			  <?php 
			  	}
			  	elseif ($vetorAluno[$posicao1 + 10] == 0) {
			  ?>
			  <select name="sexo" id="sexo">
			  	<option value="0">MASCULINO</option>
			  	<option value="1">FEMININO</option>
			  </select>&nbsp;
			  <?php 
			  	}
			  ?>
			 <label for="pais">Pais: &nbsp;</label>
			 <?php 
			 	if ($vetorAluno[$posicao1 + 11] == 'BRASIL') {
			 ?>
			  <select name="pais" id="pais">
			  	<option value="BRASIL"><?php echo $vetorAluno[$posicao1 + 11];?></option>
			  	<option value="ESTADOS UNIDOS">ESTADOS UNIDOS</option>
			  </select>&nbsp;
			  <?php 
			 	}elseif ($vetorAluno[$posicao1 + 11] == 'ESTADOS UNIDOS'){
			  ?>
			   <select name="pais" id="pais">
			  	<option value="BRASIL"><?php echo $vetorAluno[$posicao1 + 11];?></option>
			  	<option value="ESTADOS UNIDOS">ESTADOS UNIDOS</option>
			  </select>&nbsp;
			  <?php }?>
			  <label for="irmaos">Quantidade de Irm&atilde;os &nbsp;</label>
			  <input type="text" name="irmaos" id="irmaos" class="5" placeholder="Quantidade" size="4" value="<?php echo $vetorAluno[$posicao1 + 12];?>"><br><br>
			  <label for="Nome dos irmãos"> Nome dos irm&atilde;os:</label><br>
			  <textarea rows="8" cols="40" name="nomeIrmaos" id="nomeIrmaos"><?php echo $vetorAluno[$posicao1 + 13];?></textarea><br><br>
			  <label for="Roteiro">Roteiro: </label><br>
			  <textarea rows="5" cols="80" name="roteiro" id="roteiro"> <?php echo $vetorAluno[$posicao1 + 14];?></textarea><br><br>
			  <label for="Pessoas autorizadas"> Pessoas Autorizadas:</label><br>
			  <textarea rows="8" cols="40" name="pessoas" id="pessoas" ><?php echo $vetorAluno[$posicao1 + 15];?></textarea><br><br>
			  <?php
			  	$codContato = $vetorAluno[$posicao1 + 16];
			  	$situacao = $vetorAluno[$posicao1 + 17];
			  	$foto = $vetorAluno[$posicao1 + 18];
			  	$obs = $vetorAluno[$posicao1 + 19];
			  	$empresa = $vetorAluno[$posicao1 + 20];
			  	$filial = $vetorAluno[$posicao1 + 21];
			  	$posicao1++;
				}
				//echo $codContato;
				include_once 'conectaBanco.php';
				$con = abrirConexao();
				mysql_set_charset('UTF8', $con);
				
				$sql2 = mysql_query("select descricao,codigo from esc_cad_tipo_contatos where codigo = '$codContato'");
				while ($pecorre = mysql_fetch_array($sql2)){
			  ?>
			  <label for="tipo de contato" class="obrigatorio"> Tipo de Contato: &nbsp;</label>
			   <select name="tipoContato" id="tipoContato" class="15">
			  	<option value="<?php echo $pecorre['codigo'];?>"><?php echo $pecorre['descricao']; }?></option>
			  	<?php 
			  		$sql3 = mysql_query("select codigo,descricao from esc_cad_tipo_contatos where codigo <> '$codContato'");
			  		while ($linha = mysql_fetch_array($sql3)){
			  	?>
			  	<option value="<?php echo $linha['codigo'];?>"><?php echo $linha['descricao']; } mysql_close($con);?></option>
			  </select>&nbsp;
			  <?php 
				if ($situacao == 0){
			  ?>
			  <label for="situcao" class="obrigatorio" > Situa&ccedil;&atilde;o &nbsp;</label> 
			  <select name="situacao" id="situacao" class="15">
			  	<option value="0">Ativo</option>
			  	<option value="1">Inativo</option>
			  </select><br><br>
			  <?php 
			  	}
			  	elseif ($situacao == 1) {
			  ?>
			  <label for="situcao" class="obrigatorio" > Situa&ccedil;&atilde;o &nbsp;</label> 
			  <select name="situacao" id="situacao" class="15">
			  	<option value="1"">Inativo</option>
			  	<option value="0">Ativo</option>
			  </select>
			  <?php 
			  	}
			  ?>
			   <?php 
			  echo "<table>
			  	<tr>
			  		<td><img style='width:20%' src='data:image/jpeg;base64,$foto'/></td></td>
			  	</tr>
			  </table>";
			  ?>
			  <br><br>
			  <label for="Foto"> Alterar Foto: </label> <br>
			  <input type="file" name="foto" id="foto"> <br><br>
			  <label for="obs"> Observa&ccedil;&otilde;es : </label><br>
			  <textarea rows="8" cols="60" name="obs" id="obs"><?php echo $obs;?></textarea>
			  <br><br><br>
			  <input type="hidden" name="empresa" id="empresa" value="<?php echo $empresa;?>">
			  <input type="hidden" name="filial" id="filial" value="<?php echo $filial;?>">
			  <p>
			  	<button type="submit" class="btn btn-primary btn-lg">Salvar Dados</button>
			  </p>
			  </form>
			  </div>
			  <br><br>       	    	      	
			<?php 
				include 'rodape.php';
			?>
		</div><!-- /container -->
		</td></tr>
		</table>
		</div>
		<br><br><br>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#irmaos').numeric();
				$('#codigoAluno').numeric();
				$("#cpf").mask("999.999.999-99");
				$("#cep").mask("99999-999");	
			});
		</script>
		<?php 
		}else {
				header("Location: index.php");
			}
		?>
	</body>
</html>


