<?php
session_start();
if(!isset($_SESSION['user']) && ($_SESSION['user']!="admin@photoque")){
	header("Location:../home.html");
}
else{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Admin panel</title>
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
					<p>ADMINISTRATZAILEA</p>
					<div class="row">
						<div class="col-md-offset-1">
							<button onclick="location.href='./menuPropio.php'">Erabiltzaile menura</button>
							<button onclick="location.href='./logOut.php'">Irten</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<center><h5>ADMINISTRATZAILE EREMUA</h5></center>
			</div>
		</div>
		<div class="container-fluid">
			<div class="col-md-2">
				<div class="row"><button onclick="document.getElementById('blokuser').style.display = 'inline';">Erabiltzailea Blokeatu</button></div>
				<div class="row"><button onclick="document.getElementById('deletimg').style.display = 'inline';">Argazkia ezabatu</button></div>
			</div>
			<div class="col-md-offset-1 col-md-6" >
				<form id="blokuser" style="display:none;" method="post" action="adminKudeaketa.php">
					<p><input type="text" name="erab" placeholder="Erabiltzailearen eposta" required />&nbsp;<input type="submit" value="Blokeatu"/></p>
				</form>
				<form id="deletimg" style="display:none;" method="post" action="adminKudeaketa.php">
					<p><input type="text" name="titulo" placeholder="Irudiaren titulua" required />&nbsp;<input type="submit" value="Ezabatu"/></p>
				</form>
			</div>
			<div class="col-md-3" id="list" style="height:375px; overflow:scroll;">
			<?php
				include ("./konektatu.php");
				if(isset($_POST['erab'])){
					$eposta = $_POST['erab'];
					$giz = $niremysqli->query("SELECT Eposta FROM erabiltzailea WHERE Eposta LIKE '%$eposta%'");
					while ($row = $giz->fetch_assoc()){
						echo "<p><a href='./blokeatuErabiltzailea.php?user=$row[Eposta]'>$row[Eposta]</a></p>";
					}
					$giz->close();
				}
				else if(isset($_POST['titulo'])){
					$argazkia = $_POST['titulo'];
					$giz = $niremysqli->query("SELECT Argazkia,Titulua,Id FROM ARGAZKIA WHERE Titulua LIKE '%$argazkia%'");
					while($row = $giz->fetch_assoc()){
						echo "<p><a href='./ezabatuIrudia.php?id=$row[Id]' >
						<img src='data:Irudia/jpeg;base64,".base64_encode($row['Argazkia'])."' width='300px' title='$row[Titulua]' alt='$row[Titulua]'/></a></p>";
					}
					$giz->close();
				}
				else{
					echo "aqui iran las peticiones a aceptar";
				}
				$niremysqli->close();
			?>
			</div>
		</div>
	</body>
</html>
<?php
}
?>