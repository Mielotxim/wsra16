<?php
	session_start();
	if(!isset($_SESSION['user']) && ($_SESSION['user']!="admin@photoque")){
		header("Location:../home.html");
	}
	else{
		include("konektatu.php");
		if ($niremysqli->query("UPDATE erabiltzailea SET Onartua='onartua' WHERE Eposta='$_GET[user]'") === TRUE) {
			header("Location:adminKudeaketa.php");
		} else {
			echo "Error deleting record: " . $niremysqli->error;
		}
		$niremysqli->close();
	}
?>