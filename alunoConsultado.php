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
		<meta charset="UTF-8"/>
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
		if (isset($_SESSION["teste"])){
			$vetorAluno = $_SESSION["teste"];
			$codigo = "";
		foreach ($vetorAluno as &$value) {
    			$codigo = $value;
		}	
		echo $codigo;
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
				include_once 'conectaBanco.php';
				$con = abrirConexao();
				mysql_set_charset('UTF8', $con);
				$tipoContato = "";
				$situacao = "";
				$sexo = "";
				$obs = "";
				$foto = "";
				$sql = mysql_query("select * from esc_cad_aluno_capa where codigo = '$codigo'");
				while ($linha = mysql_fetch_array($sql)){
						$situacao = $linha['SITUACAO'];
						$sexo = $linha['SEXO'];
						$tipoContato = $linha['COD_TIPO_CONTATO'];
						$obs = $linha['OBS'];
						$foto = base64_encode($linha['FOTO']);
			?>
			<p><h3>Dados do Aluno</h3></p>
			<form action="processaCadastroAluno.php" id="formAluno" method="post" enctype="multipart/form-data">
              <label for="nome" class="obrigatorio">Nome: &nbsp;</label>
              <input type="text" id="nome" name="nome" required="required" maxlength="50" style="width: 30%;" placeholder="Nome Completo"  readonly="readonly" value="<?php echo $linha['NOME']?>">&nbsp;
              <label for="cpf" class="obrigatorio">CPF: &nbsp;</label>
              <input type="text" id="cpf" name="cpf" placeholder="CPF" required="required"  readonly="readonly" maxlength="14" class="15" value="<?php echo $linha['CPF']?>" onblur="return verificarCPF(this.value);">&nbsp;
              <label for="rg">RG: &nbsp;</label>
              <input type="text" id="rg" name="rg" maxlength="7" class="15" placeholder="RG" size="7"  readonly="readonly" value="<?php echo $linha['RG']?>">
              <label for="dataNasc">Data Nascimento:</label>
              <input type="date" id="dataNasc" name="dataNasc" maxlength="14" class="15"  readonly="readonly" value="<?php echo $linha['DATA_NASCIMENTO']?>"><br><br>
              <label for="cep" class="obrigatorio">CEP: &nbsp;</label>
              <input type="text" id="cep" name="cep" maxlength="14" placeholder="Cep" required="required" size="7"  readonly="readonly" value="<?php echo $linha['CEP']?>"  class="15" onblur="pesquisacep(this.value);">&nbsp;
              <label for="rua" class="obrigatorio"> Rua: &nbsp;</label>
              <input type="text" required="" placeholder="Rua" name="rua" id="rua" style="width: 20%;"  readonly="readonly" value="<?php echo $linha['ENDERECO']?>">&nbsp;
			  <label for="bairro" class="obrigatorio"> Bairro: &nbsp;</label>
			  <input type="text" required="required" placeholder="Bairro" name="bairro" id="bairro" class="20" maxlength="30"  readonly="readonly" value="<?php echo $linha['BAIRRO']?>">&nbsp;                   	
			  <label for="cidade" class="obrigatorio">Cidade: &nbsp;</label>
			  <input type="text" required="" placeholder="Cidade" name="cidade" id="cidade" class="20" maxlength="30"  readonly="readonly" value="<?php echo $linha['CIDADE']?>">&nbsp;
			  <label for="uf" class="obrigatorio">UF: &nbsp;</label>
			  <input type="text" required="" placeholder="UF" name="uf"  id="uf" style="width:5%;" maxlength="2"  readonly="readonly" value="<?php echo $linha['UF']?>">&nbsp;<br><br>
			  <label for="Numero" class="obrigatorio">Numero &nbsp;</label>
			  <input type="text" required="" placeholder="Numero" size="4" name="numero"  id="numero" class="5" maxlength="8"  readonly="readonly" value="<?php echo $linha['NUMERO']?>">&nbsp;			  
			  <input type="hidden" name="ibge" id="ibge" class="5" readonly="readonly">
			  <label for="Complemento">Complemento:</label>
			  <input type="text" id="complemento" name="complemento" class="20" readonly="readonly">&nbsp; 
			  <label for="sexo">Sexo: &nbsp;</label>
			  <?php 
			  	if ($sexo == 1) {		
			  ?>
			  <select name="sexo" id="sexo">
			  	<option value="1" readonly="readonly">FEMININO</option>
			  </select>&nbsp;
			  <?php 
			  	}
			  	elseif ($sexo == 0) {
			  ?>
			  <select name="sexo" id="sexo">
			  	<option value="0" readonly="readonly">MASCULINO</option>
			  </select>&nbsp;
			  <?php 
			  	}
			  ?>
			 <label for="pais">Pais: &nbsp;</label>
			  <select name="pais" id="pais">
			  	<option value="BRASIL"><?php echo $linha['PAIS']?></option>
			  </select>&nbsp;
			  <label for="irmaos">Quantidade de Irm&atilde;os &nbsp;</label>
			  <input type="text" name="irmaos" id="irmaos" class="5" placeholder="Quantidade" readonly="readonly" size="4" value="<?php echo $linha['IRMAOS_QTDE']?>"><br><br>
			  <label for="Nome dos irm�os"> Nome dos irm&atilde;os:</label><br>
			  <textarea rows="8" cols="40" name="nomeIrmaos" id="nomeIrmaos"><?php echo $linha['IRMAOS_NOME']?></textarea><br><br>
			  <label for="Roteiro">Roteiro: </label><br>
			  <textarea rows="5" cols="80" name="roteiro" id="roteiro" readonly="readonly"> <?php echo $linha['ROTEIRO'];?></textarea><br><br>
			  <label for="Pessoas autorizadas"> Pessoas Autorizadas:</label><br>
			  <textarea rows="8" cols="40" name="pessoas" id="pessoas" readonly="readonly"><?php echo $linha['PESSOAS_AUTORIZADAS'];?></textarea><br><br>
			  <?php 
				}
				$sql2 = mysql_query("select descricao from esc_cad_tipo_contatos where codigo = '$tipoContato'");
				while ($pecorre = mysql_fetch_array($sql2)){
			  ?>
			  <label for="tipo de contato" class="obrigatorio"> Tipo de Contato: &nbsp;</label>
			   <select name="tipoContato" id="tipoContato" class="15">
			  	<option><?php echo $pecorre['descricao'];?></option>
			  </select>&nbsp;
			  <?php 
				}if ($situacao == 0){
			  ?>
			  <label for="situcao" class="obrigatorio" readonly="readonly"> Situa&ccedil;&atilde;o &nbsp;</label> 
			  <select name="situacao" id="situacao" class="15">
			  	<option value="0" readonly="readonly">Ativo</option>
			  </select><br><br>
			  <?php 
			  	}
			  	elseif ($situacao == 1) {
			  ?>
			  <label for="situcao" class="obrigatorio" readonly="readonly"> Situa&ccedil;&atilde;o &nbsp;</label> 
			  <select name="situacao" id="situacao" class="15">
			  	<option value="0" readonly="readonly">Ativo</option>
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
			  <label for="obs"> Observa&ccedil;&otilde;es : </label><br>
			  <textarea rows="8" cols="60" name="obs" id="obs" readonly="readonly"><?php echo $obs;?></textarea>
			  <br><br><br>
			  </form>
			  <form action="verDadoAluno.php" method="post">
			  <input type="hidden" name="codigoAlunoVer" id="codigoAlunoVer" value="<?php echo $codigo?>">
			  <p>
			  	<button type="submit" class="btn btn-primary btn-lg">Alterar Dados</button>
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

