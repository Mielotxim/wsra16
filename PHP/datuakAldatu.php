<?php
session_start();
if(!isset($_SESSION['user'])){
	header("Location:../home.html");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title><?php echo $_SESSION['user'];?></title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/custom.min.css" />
		<script src="../js/erregistro.js"></script>
	</head>
	<body style="background-color:#E6E6E6;">
		<div class="jumbotron" id="jumbo" style="background-color:#48F87C; border-style:solid;border-color:#05A417;">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<center><h1>PHOTOQUE</h1></center>
				</div>
				<div class="col-md-3">
					<p><?php echo $_SESSION['user']?></p>
					<div class="row">
						<div class="col-md-offset-8">
							<button onclick="location.href='./logOut.php'">Irten</button>
						</div>
						</div>
				</div>
			</div>
			<div class="row">
				<center><h5>YOUR RUSKY PHOTOS</h5></center>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container-fluid">
				<center><form onsubmit='return aldaketa(this.izena.value, this.pass.value, this.passKonf.value)' method='post' action="./menuPropio.php">
				<?php
					include "konektatu.php";
					$giz = $niremysqli->query("SELECT Izena, Abizenak, Pasahitza FROM erabiltzailea WHERE Eposta='".$_SESSION['user']."'");
					$row = $giz->fetch_assoc();
					echo "<p>Izena: <input type='text' id='izena' name='izena' placeholder='Izena' value='$row[Izena]' ></input><b></b></p>
					<p>Abizenak: <input type='text' id='abizena' name='abizenak' placeholder='Abizenak' value='$row[Abizenak]' ></input></p>"
				?>
					<p>Pasahitza: <input type="password" id="pass" name="pass" placeholder="Pasahitz Berria"></input></p>
					<p>Konfirmatu pasahitza: <input type="password" id="passKonf" name="passKonf" placeholder="Pasahitza konfirmatu"></input></p>
					<p><input type="password" id="konfimr" name="konfirm" placeholder="Pasahitza Zaharra"></input>&nbsp <input type="submit" value="Erregistratu"></input></p>
				</form></center>
			</div>
		</div>
	</body>
</html>
<?php
	if(isset($_POST['konfirm'])){
		if(strcmp($row['Pasahitza'],sha1($_POST['konfirm']))==0){
			
		}
	}
	$niremysqli->close();
?>