<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title><?php echo $_SESSION['user'];?></title>
		<!--<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />-->
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/custom.min.css" />
		<script src="./js/erregistro.js"></script>
		<script>
				var loadFile = function(event) {
				var output = document.getElementById('image');
				output.src = URL.createObjectURL(event.target.files[0]);
				output.style.display="inline";
				};
			</script>
			<script>
				if((document.getElementById("irudi").value=="" && (document.getElementById("private").value!="private" ||document.getElementById("private").value!="public" || document.getElementById("private").value!="friend") ){
					alert ("algo va mal.");
					return false;
				}
				else{
					return true;
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
							<button onclick="location.href='./logOut.php'">Irten</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<center><h5>YOUR RUSKY PHOTOS</h5></center>
			</div>
		</div>
		<form  id="erregistro" name="erregistro" method="post" onSubmit="return todoBien()" action="./argazkiaIgo.php" enctype="multipart/form-data">
			<p>IRUDIA aukeratu: </p><input type="file" accept="image/*" id="irudi" name="irudi" onchange="loadFile(event)"></input>
			<img id="image" name="image" style="height:400px;width:400px;display:none;position:absolute;right:35%;top:40%;"></img>
			<br><p>IZENBURUA: </p><input type="text" id="izenburu" name="izenburua" placeholder="TXUPIPARTY EN LA PLAYA"></input></br>
			<br><p>IZENBURUA: </p><input type="radio" id="private" name="private" value="private">Pribatua</input>
															 <input type="radio" id="private" name="private" value="public">Publikoa</input>
															 <input type="radio" id="private" name="private" value="friend">Lagunentzako</input></br>
			<button name="balioztatu" id="balioztatu" style="border-style:solid;border-color:#895895;" value="balioztatu">
						<span class="glyphicon glyphicon-power" aria-hidden="true"></span>  BAIEZTATU
					</button>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['private'],$_FILE['irudi'])){
	echo "TO JAKEROO !";
	$argazkia =addslashes(file_get_contents($_FILES['irudi']['tmp_name']));
	}
?>
		