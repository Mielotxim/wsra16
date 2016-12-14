		<center>
			<?php
				include("konektatu.php");
				$giz = $niremysqli->query("SELECT id,Argazkia,Titulua,Likes FROM ARGAZKIA WHERE Eposta =  '".$_SESSION['user']."'");
				
					while($row = $giz->fetch_assoc()){
						echo "<br><div style='border-style:solid;border-color:black;width:400px;height:500px;'>
							<div class='row'><h1>".$row['Titulua']."</h1></div>
							<div class='row'>
								<img src='data:Irudia/jpeg;base64,".base64_encode( $row['Argazkia'] )."' width='250px' />
							</div>
							<div  class='row'>
								<br><button name='".$row['Titulua']."' id='".$row['Titulua']."' style='border-style:solid;border-color:grey;' value='like' onclick='megusta(".$row['id'].".)'>
									<span class='glyphicon glyphicon-heart' aria-hidden='true'></span>  LIKE 
								</button></br>
								<input type='textField' id='".$row['id']."' value='".$row['Likes']."' readonly />
							</div>
							
						</div></br>";
					}
				$giz->close();
				$niremysqli->close();
			?>
		</center>