function saioaHasita(){
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){ 
			document.getElementById("userDiv").innerHTML=xhttp.responseText;
		}
	};
	//esto hay que cambiarlo en hostinguer
	xhttp.open("GET","http://localhost/photoque/php/saioaBadago.php", true);
	xhttp.send();
}