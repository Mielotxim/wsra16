var pEposta = /^(\w+)@(\D+)\.(\D+)$/;

function balioztatu(izena, eposta, pasahitza, pasahitzaKon){
		var errorea = "TXARTO ADIERAZITAKO ATALAK:\n\n";
		var ondo = true;
		if(izena.length < 1){
			ondo = false;
			errorea +="IZENA: ez duzu bete.\n\n";
		}
		if((eposta.length < 1) && (!pEposta.test(eposta))){
			ondo = false;
			errorea +="Eposta: ez duzu bete.\n\n";
		}
		if(pasahitza.length < 5){
			ondo = false;
			errorea +="Pasahitza: laburregia da, gutxinez 6 karaktere.\n\n";
		}
		if(pasahitzaKon.localeCompare(pasahitza) != 0){
			ondo = false;
			errorea +="Pasahitza: konfirmazioa ez du kointziditzen.\n\n";
		}
		if(!ondo){
			alert(errorea);
		}
		return ondo;
}