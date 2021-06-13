	var origen = document.getElementById("origen");
	var destino = document.getElementById("destino");
	var combi = document.getElementById("combi");
	var km = document.getElementById("km");
	var duracion = document.getElementById("duracion");

	function checkRuta(){
		return validarOrigen() && validarDestino() && validarRepeticion() && validarCombi() && validarKm() && validarDuracion();
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

	function validarRepeticion(){
		if(origen.value == destino.value){
			alert("El origen y el destino no pueden ser iguales");
			return false;
		}
		return true;
	}
		
	function validarCombi(){
		if(combi.value =="x"){
			alert("Selecciona una combi");
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
		if (window.location.hash == "#error"){
			alert("El origen y el destino no pueden ser el mismo");
		}
		if (window.location.hash == "#errorRepetido"){
			alert("No se puede crear una ruta con los campos origen, destino y combi iguales a una existente");
		}
	}