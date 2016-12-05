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
		<!--<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />-->
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/custom.min.css" />
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
		<div class="col-md-1">
			<div class="row"><button onclick="location.href='./menuPropio.php'">Atzera</button></div>
		</div>
		<div class="col-md-offset-4 col-md-2"><center>
			<form  id="erregistro" name="erregistro" method="post" onSubmit="todoBien()"  action="./sortuAlbuma.php">
				<br><p>Izena: </p><input type="text" id="izena" name="izena" placeholder="Fotos Salou"></input></br>
				<br><button name="balioztatu" id="balioztatu" style="border-style:solid;border-color:#895895;" value="balioztatu">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  BAIEZTATU
				</button></br>
			</form></center>
		</div>
	</body>
</html>

<?php
	if(isset($_POST['izena']) && strlen($_POST['izena'])!=0){
		include('konektatu.php');
		$sql = "INSERT INTO albuma(Izena,Egilea)
		VALUES('$_POST[izena]' , '$_SESSION[user]')";

		if (!$niremysqli->query($sql)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		else {
			echo "<div class='col-md-offset-4 col-md-4'><br><p>OK</p></br></div>";
		}
	}
	else{
		echo "<div class='col-md-offset-4 col-md-4'><br><p>Datuak dagokien informazioekinbete itzazu mesedez.</p></br></div>";
		}
?>