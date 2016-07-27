<?php include("mpdf60/mpdf.php");
	include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		<?php 
  // Connect to the database
  $dbconn = pg_connect('dbname=foo');
  
  // Get the bytea data
  $res = pg_query("SELECT data FROM gallery WHERE name='Pine trees'");  
  $raw = pg_fetch_result($res, 'data');
  
  // Convert to binary and send to the browser
  header('Content-type: image/jpeg');
  echo pg_unescape_bytea($raw);
?>