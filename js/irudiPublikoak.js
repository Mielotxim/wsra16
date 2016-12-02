function kargatuIrudiak(){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){ 
			document.getElementById("edukia").innerHTML= xhttp.responseText;
		}
	};
	//esto hay que cambiarlo en hostinguer
	xhttp.open("GET","http://localhost/photoque/php/irudiPublikoak.php", true);
	xhttp.send();
}