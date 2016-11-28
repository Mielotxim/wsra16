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
				<p>Erabiltzailea: <input type="text" id="erab" placeholder="Erabiltzailea" ></input></p>
				<p>Pasahitza: <input type="password" id="pass"></input></p>
				<input type="submit" value="Ok" id="ok"></input>
			</form>
			</div>
		</br>
		<a href="../home.html">-=HOME=-</a>
		</body>
</html>

<?php
	if(isset($_POST['erab'],$_POST['pass'])){
		echo "va bien";
	}
?>