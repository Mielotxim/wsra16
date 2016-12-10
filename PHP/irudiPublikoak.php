<?php
	include "konektatu.php";
	$giz = $niremysqli->query("SELECT Titulua, Argazkia FROM argazkia WHERE Kategoria='public' order by Date DESC");
	$popi=0;
	$pipo=false;
	while(($row = $giz->fetch_assoc()) && $pipo==false) {
		echo "<div class='row'><center>";
		echo "<br><div style='border-style:solid;border-color:black;width:400px;height:500px;'>
							<div class='row'><h1>".$row['Titulua']."</h1></div>
							<div class='row'>
								<img src='data:Irudia/jpeg;base64,".base64_encode( $row['Argazkia'] )."' width='250px'' />
							</div>
						</div></br>";
		echo "</center></div>";
		$popi ++;
		if($popi==3){
			$pipo=true;
		}
	}
	$giz->close();
	$niremysqli->close();
?>