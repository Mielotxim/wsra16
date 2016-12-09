<?php
	session_start();
	if(!isset($_SESSION['user']) && ($_SESSION['user']!="admin@photoque")){
		header("Location:../home.html");
	}
	else{
		echo "TO DO";
	}
?>