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
			<div class="row"><button onclick="location.href='./albuma.php'">Zure Albumak</button></div>
			<?php 
				if($_SESSION['user']==="admin@photoque.eus"){
			?>
			<div class="row"><button onclick="location.href='./adminKudeaketa.php'">Admin things</button></div>
			<?php
				}
			?>
		</div>
		<div class="col-md-offset-10">
			<p>Albumak:</p>
			<?php
				include("konektatu.php");
				$giiz = $niremysqli->query("SELECT Izena FROM albuma WHERE Egilea='".$_SESSION['user']."' ");
				while($roow= $giiz->fetch_assoc()){
					echo "<div class='row'><b><a href='albuma.php?Izena=".$roow['Izena']."'>".$roow['Izena']."</a></b></div>";
				}
			?>
		</div>
		<?php
					include('./photo.php');
		?>
	</body>
</html>