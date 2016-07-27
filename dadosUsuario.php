
<?php
	$sair = "sair"
?>
<table class="table">
	<tr>
		<th>Usu&aacute;rio</th>
		<th>Sair</th>
	</tr>
	<tr>
		<td><?php echo $nome;?></td>
		<td>
			<a href="valida_login.php?sair=<?php echo $sair;?>">
				<button type="button" class="btn btn-labeled btn-danger">
	             	<span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Sair
	           	</button>
	        </a>
		</td>
	</tr>
</table>