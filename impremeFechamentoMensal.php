<?php 
	include("mpdf60/mpdf.php");
	include_once 'conectaBanco.php';
        $con = abrirConexao();
	mysql_set_charset('UTF8', $con);
		
	$recno = $_GET['recno'];
	
        $professor = "";
        $aluno = "";
        $dicritivo = "";
        $data = "";
         $sql= mysql_query("select m.DATAHORA,  f.NOME AS 'PROFESSOR', a.NOME AS 'ALUNO', m.DISCRITIVO from  esc_rel_fechamento_mensal m
            left join cad_funcionario f on m.USUARIO = f.COD_USUARIO
            left join esc_cad_aluno_capa a on m.ALUNO = a.CODIGO
            where m.RECNO = '$recno'");
		
		while ($linha = mysql_fetch_object($sql)){
			$data = date('d/m/Y', strtotime($linha->DATAHORA));
			$professor = $linha->PROFESSOR;
			$aluno = $linha->ALUNO;
			$dicritivo = $linha->DISCRITIVO;
			break;
		}
		//date('d/m/Y', strtotime($data));
		
		
		
			$html = "
			 <fieldset>
			 
			 <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
			 <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
			 <title>EPC - Espaço Paula Calado</title>
			 <meta name='description' content='Responsive Retina-Friendly Menu with different, size-dependent layouts' />
			 <meta name='keywords' content='responsive menu, retina-ready, icon font, media queries, css3, transition, mobile' />
			 <meta name='author' content='Codrops' />
			 <link rel='shortcut icon' href='../favicon.ico'> 
			 <link rel='stylesheet' type='text/css' href='css/default.css' />
			 <link rel='stylesheet' type='text/css' href='css/component.css' />
			 <script src='js/modernizr.custom.js'></script>
			 <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen' />
			 <script src='bootstrap/js/bootstrap.min.js'></script>
			 
			
				
      				<div>
      					<img src='images/LOGO_EPC.jpg' width='321' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
      				</div>
      				
      				<div>
      					<table border='1' class='table'>
							<tr>
								<th class='th1'>Documento</th>
								<th class='th2'>FECHAMENTO MENSAL</th>
							</tr>
							<tr>
								<th class='th1'>Data</th>
								<th class='th2'>$data</th>
							</tr>
							<tr>
								<th class='th1'>PROFESSOR</th>
								<th class='th2'>$professor</th>
							</tr>
							<tr>
								<th class='th1'>ALUNO</th>
								<th class='th2'>$aluno</th>
							</tr>
					</table>
				</div>
				<br><br>
				<div>
                                         <table class='table' border='1'>
							<tr>
								<th>DISCRITIVO</th>
							</tr>
							<tr>
                                                            <td><textarea rows='20' cols='80' class='textoArea'>$dicritivo</textarea></td>
							</tr>
					</table>
				</div>
                                <br>
			 </fieldset>";

	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("cssTeste.css");
	$teste = file_get_contents("testes.php");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();

	exit;
		
?>