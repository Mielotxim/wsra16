<?php
	include "konektatu.php";
	$giz = $niremysqli->query("SELECT Titulua, Argazkia FROM argazkia WHERE Kategoria='public'");
	while($row = $giz->fetch_assoc()) {
		echo "<div class='row'><center>";
		echo "<br><div style='border-style:solid;border-color:black;width:400px;height:500px;'>
							<div class='row'><h1>".$row['Titulua']."</h1></div>
							<div class='row'>
								<img src='data:Irudia/jpeg;base64,".base64_encode( $row['Argazkia'] )."' width='250px'' />
							</div>
						</div></br>";
		echo "</center></div>";
	}
	echo "Hutsik dago";
	$giz->close();
	$niremysqli->close();
?>