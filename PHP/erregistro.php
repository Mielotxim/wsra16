<?php
	$izena=$_POST['izena'];
	$abizenak="";
	if(isset($_POST['abizenak'])){
		$abizenak=$_POST['abizenak'];
	}
	$eposta=$_POST['eposta'];
	$pasahitza=$_POST['pass'];
	$konfirmazioa=$_POST['passKonf'];
	$patron=array("options"=>array("regexp"=>"/^(\w+)@(\D+)\.(\D+)$/"));
	
	if((strlen($izena) > 0) && (strlen($pasahitza) > 5) && (strcmp($pasahitza, $konfirmazioa) == 0) && filter_var($eposta,FILTER_VALIDATE_REGEXP,$patron)) {
		include "./konektatu.php";
		
		$pasahitza = sha1($pasahitza);
		$sql = "INSERT INTO erabiltzailea(Eposta, Izena, Abizenak, Pasahitza) VALUES ('$eposta','$izena','$abizenak','$pasahitza')";
		if (!$niremysqli->query($sql)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		else { header("Location:menuPropio.php")}
		echo "<p><a href='../home.html'>Home</a></p>";
		$niremysqli->close();
	}
?>