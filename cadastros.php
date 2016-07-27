<?php 
	session_start();

	if (isset($_SESSION["USUARIO"])) {
		$nome = $_SESSION["USUARIO"];
		$cpf = $_SESSION["CPF"];
		$codigo  = $_SESSION["CODIGO"];
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
	</head>
	<body>
	<br><br>
	<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
			<a href="home.php" style="text-decoration: none;">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU PRINCIPAL</button>
			</a>
			<div class="main clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6">
							<a href="cadastroAluno.php" style="text-decoration: none;">
								<img class="img-responsive" src="IMAGE/aluno_1.png"/><br>
							</a>
							<a href="cadastroAluno.php" style="text-decoration: none;" class="links">CADASTRO DE ALUNO</a>
						</div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroResponsavel.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/responsavel.png"/><br>
				        	</a>
				        	<a href="cadastroResponsavel.php" style="text-decoration: none;" class="links">&nbsp;&nbsp;&nbsp;CADASTRO DE RESPONSAVEL</a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroEmail.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/disciplina_2.png"/><br>
				        	</a>
				        	<a class="links" href="cadastroDisciplina.php" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CADASTRO DE DISCIPLINA</a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroEmail.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/email_3.png"/><br>
				        	</a>
				        	<a class="links" href="cadastroEmail.php" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CADASTRO DE EMAIL</a>
				        </div>      
				    </div>
				    <br><br>
				   <div class="row">
				    	<div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroFeriado.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/calendario.png"/><br>
				        	</a>
				        	<a class="links" href="cadastroFeriado.php" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CADASTRO DE FERIADO</a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroFamilia.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/familia.png"/><br>
				        	</a>
				        	<a class="links" href="cadastroFamilia.php" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CADASTRO DE FERIADO</a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="cadastroContato.php" style="text-decoration: none;">
				        		<img class="img-responsive" src="IMAGE/contato.png"/><br>
				        	</a>
				        	<a class="links" href="cadastroContato.php" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CADASTRO DE CONTATO</a>
				        </div>
				    </div>
				</div>
			</div>
			<?php 
			include 'rodape.php';
		?>
		</div><!-- /container -->
		</td></tr>
		</table>
		</div>
		<br><br><br>
		<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
	</body>
</html>
