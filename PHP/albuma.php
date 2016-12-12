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
			<div class="row"><button onclick="location.href='./argazkiaIgo.php'">Argazki bat Igo</button></div>
			<div class="row"><button onclick="location.href='./datuakAldatu.php'">Datu pertsonalak aldatu</button></div>
			<div class="row"><button onclick="location.href='./menuPropio.php'">Zure Perfila</button></div>
		</div>
			<center>
			<?php
				include("./konektatu.php");
				$giz = $niremysqli->query("SELECT Argazkia, Titulua FROM ARGAZKIA WHERE Eposta = '".$_SESSION['user']."' AND Albuma = '".$_GET['Izena']."'");
					while($row = $giz->fetch_assoc()){
						echo "<br><div style='border-style:solid;border-color:black;width:400px;height:500px;'>
							<div class='row'><h1>".$row['Titulua']."</h1></div>
							<div class='row'>
								<img src='data:Irudia/jpeg;base64,".base64_encode( $row['Argazkia'] )."' width='250px' />
							</div>
							<div  class='row'>
								<br><button name='like' id='like' style='border-style:solid;border-color:grey;' value='like'>
									<span class='glyphicon glyphicon-heart' aria-hidden='true'></span>  LIKE 
								</button></br>
							</div>
						</div></br>";
					}
				$giz->close();
				$niremysqli->close();
			?>
		</center>
	</body>
</html>