<?php
	$niremysqli = new mysqli("mysql.hostinger.es", "u226121018_photo", "1234567", "u226121018_photo");
	//$niremysqli = new mysqli("localhost", "root", "", "photoque");
	if ($niremysqli->connect_errno) {
		echo "Huts egin du konexioak MySQL-ra: (" . $niremysqli-> connect_errno . ") " . $niremysqli-> connect_error;
	}
?>