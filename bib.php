<?php

function date_converter($_date = null) {
	$format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
	if ($_date != null && preg_match($format, $_date, $partes)) {
		return $partes[3].'-'.$partes[2].'-'.$partes[1];
	}
	return false;
}

?>

