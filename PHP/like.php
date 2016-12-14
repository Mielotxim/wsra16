<?php
	include("./konektatu.php");
	$giz = $niremysqli->query("UPDATE argazkia SET Likes=Likes+1 WHERE Id=".$_GET['foto']);
	$giz->fetch_assoc();
	$giz->close();
	$niremysqli->close();
?>