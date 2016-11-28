<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/custom.min.css" />
	</head>
	<body style="background-color:#d3d3d3;">
		
		<br>
			<div class="col-md-offset-2">
			<form id="formularioa" name="formularioa" method="POST" onSubmit="./login.php">
				<p>Erabiltzailea: <input type="email" name="erab" id="erab" placeholder="Erabiltzailea" ></input></p>
				<p>Pasahitza: <input type="password" name="pass" id="pass"></input></p>
				<input type="submit" value="Ok" id="ok"></input>
			</form>
			</div>
		</br>
		<a href="../home.html">-=HOME=-</a>
		</body>
</html>

<?php
	if(isset($_POST['erab'],$_POST['pass'])){
		$eposta = $_POST['erab'];
		$pasahitza = $_POST['pass'];
		include ("./konektatu.php");
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE Eposta='$eposta'");
		$row = $giz->fetch_assoc();
		if($pasahitza===$row['Pasahitza']){
			header("location:./photo.php");
		}
	}
?>