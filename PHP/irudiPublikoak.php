<?php
	include "konektatu.php";
	$giz = $niremysqli->query("SELECT Titulua, Argazkia FROM argazkia WHERE Kategoria='publikoa'");
	while($row = $giz->fetch_assoc()) {
		echo "<div class='row'><center>";
		echo "<p>$row[Titulua]</p><img src='data:Irudia/jpeg;base64,".base64_encode( $row[Argazkia] )."/>";
		echo "</center></div>";
	}
	echo "Hutsik dago";
	$giz->close();
	$niremysqli->close();
?>