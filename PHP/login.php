<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Logeatu</title>
		<!--<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />-->
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/custom.min.css" />
	</head>
	<body style="background-color:#E6E6E6;">
		<div class="jumbotron" id="jumbo" style="background-color:#48F87C; border-style:solid;border-color:#05A417;">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<center><h1>PHOTOQUE</h1></center>
				</div>
				<div class="col-md-1">
					<div class="row"><button onclick="location.href='../home.html'">Home</button></div>
				</div>
			</div>
			<div class="row">
				<center><h5>YOUR RUSKY PHOTOS</h5></center>
			</div>
		</div>
		<center>
		<br>
			<div>
			<form id="formularioa" name="formularioa" method="POST" onSubmit="./login.php">
				<p>Erabiltzailea: <input type="email" name="erab" id="erab" placeholder="Erabiltzailea" ></input></p>
				<p>Pasahitza: <input type="password" name="pass" id="pass" placeholder="Pasahitza"></input></p>
				<input type="submit" value="Ok" id="ok"></input>
			</form>
			</div>
		</br>
		</center>
	</body>
</html>


<?php
	if(isset($_POST['erab'],$_POST['pass'])){
		$eposta = $_POST['erab'];
		$pasahitza = $_POST['pass'];
		include ("./konektatu.php");
		$passcript=sha1($pasahitza);
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE Eposta='$eposta'");
		$row = $giz->fetch_assoc();
		if($passcript===$row['Pasahitza']){
			session_start();
			$_SESSION['user']=$eposta;
			header("location:./menuPropio.php");
		}
		$niremysqli->close();
	}
?>