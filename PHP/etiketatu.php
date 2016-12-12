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
		<script>
			function etiketaUser(id){
				document.getElementById("argazki").value=id;
				document.getElementById("etiketa").style.display="inline";
			}
		</script>
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
							<button onclick="location.href='./menuPropio.php'">Atzera egin</button>
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
			<div class="row"><button onclick="location.href='./sortuAlbuma.php'">Albuma sortu</button></div>
			<div class="row"><button onclick="location.href='./etiketatu.php'">Etiketatu erabiltzaileak</button></div>
			<?php 
				if($_SESSION['user']==="admin@photoque.eus"){
			?>
			<div class="row"><button onclick="location.href='./adminKudeaketa.php'">Admin things</button></div>
			<?php
				}
			?>
		</div>
		<div class="col-md-offset-1 col-md-5">
			<form action="etiketatu.php" method="post">
				<input type="text" name="photo" placeholder="Argazki Izena" />
				<input type="submit" value="Bilatu" />
			</form><br/>
			<?php
				include ("./konektatu.php");
				if(isset($_POST['photo'])){
					$argazkia = $_POST['photo'];
					$giz = $niremysqli->query("SELECT Argazkia,Titulua,Id FROM ARGAZKIA WHERE Eposta='".$_SESSION['user']."' AND Titulua LIKE '%$argazkia%'");
					while($row = $giz->fetch_assoc()){
						echo "<p><img src='data:Irudia/jpeg;base64,".base64_encode($row['Argazkia'])."' width='300px' style='cursor:pointer' title='$row[Titulua]' alt='$row[Titulua]' onclick='etiketaUser($row[Id])'/></p>";
					}
					$giz->close();
				}
				else{
					$giz = $niremysqli->query("SELECT Argazkia,Titulua,Id FROM ARGAZKIA WHERE Eposta='".$_SESSION['user']."'");
					while($row = $giz->fetch_assoc()){
						echo "<p><img src='data:Irudia/jpeg;base64,".base64_encode($row['Argazkia'])."' width='300px' style='cursor:pointer' title='$row[Titulua]' alt='$row[Titulua]' onclick='etiketaUser($row[Id])'/></p>";
					}
					$giz->close();
				}
			?>
		</div>
		<div class="col-md-3">
			<div class="row"><form id="etiketa" method="post" action="etiketatu.php" style="display:none" >
				<input type="text" id="argazki" name="argazki" style="display:none" />
				<input type="text" name="erab" placeholder="Erabiltzaile eposta" />
				<input type="submit" value="Bilatu" />
			</form></div>
			<div class="row">
			<?php
				if(isset($_POST['erab'])){
					$eposta = $_POST['erab'];
					$giz = $niremysqli->query("SELECT Eposta FROM erabiltzailea WHERE Eposta LIKE '%$eposta%'");
					while ($row = $giz->fetch_assoc()){
						echo "<p><a href='./etiketatuErabiltzailea.php?user=$row[Eposta]&photo=".$_POST['argazki']."'>$row[Eposta]</a></p>";
					}
					$giz->close();
				}
			?>
			</div>
		</div>
	</body>
</html>
<?php
	$niremysqli->close();
?>