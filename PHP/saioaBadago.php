<?php
	session_start();
	if(isset($_SESSION['user'])){
		$logout="'./php/logOut.php'";
		echo "<p>".$_SESSION['user']."</p>
		<div class='row'>
		<div class='col-md-offset-8'>
		<button onclick='logout()'>Irten</button>
		</div></div>";
	}
	else{
		echo "<div class='row'><button onclick='login()'>LogIn</button></div>
		<div class='row'><button onclick='signup()'>SingUp</button></div>";
	}
?>