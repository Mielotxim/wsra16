<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../home.html");
	}
	else{
		include("konektatu.php");
		if ($niremysqli->query("INSERT INTO erabiltzaileetiketatuak VALUES(".$_GET['photo'].", '".$_GET['user']."')") === TRUE) {
			header("Location:etiketatu.php");
		} else {
			echo "Error deleting record: " . $niremysqli->error;
		}
		$niremysqli->close();
	}
?>