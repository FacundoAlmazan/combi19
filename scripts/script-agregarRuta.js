	var origen = document.getElementById("origen");
	var destino = document.getElementById("destino");
	var combi = document.getElementById("combi");
	var km = document.getElementById("km");
	var duracion = document.getElementById("duracion");

	function checkRuta(){
		return validarOrigen() && validarDestino() && validarCombi() && validarKm() && validarDuracion();
	}

	function validarOrigen(){
		if(origen.value =="x"){
			alert("Selecciona un origen");
			return false;
		}
		return true;
	}

	function validarDestino(){
		if(destino.value =="x"){
			alert("Selecciona un destino");
			return false;
		}
		return true;
	}
		
	function validarCombi(){
		if(combi.value =="x"){
			alert("Selecciona una peluca");
			return false;
		}
		return true;
	}

	function validarKm(){
		if(km.value==""){
			alert("Ingresa kilómetros");
			return false;
		}
		return true;
	}

	function validarDuracion(){
		if(duracion.value==""){
			alert("Ingresa una duración");
			return false;
		}
		if(!validarFormatoHora(duracion.value)){
        	alert("La duración debe cumplir con el formato HH:MM:SS");
			return false;
		}
		return true;
	}

	function validarFormatoHora(Duracion){
		var patron = /(?:[0-5]\d):(?:[0-5]\d):(?:[0-5]\d)/;
		if (patron.test(Duracion)){
	        return true;
	    }
	    else{
	        return false;
	    }
	}


	window.onload = function(){
		if (window.location.hash == "#agregado"){
			alert("La ruta se ha agregado con exito");
		}
	}

	window.onload = function(){
		if (window.location.hash == "#modificado"){
			alert("La ruta se ha modificado con exito");
		}
	}