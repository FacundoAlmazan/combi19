	var lugar = document.getElementById("lugar");
	var provincia = document.getElementById("provincia");

	function checkLugar(){
		return validarLugar() && validarProvincia();
	}

	function validarLugar(){
		if(lugar.value==""){
			alert("El lugar no puede estar vacio");
			return false;
		}
		if(!validarAlfanumericos(lugar.value)){
        	alert("El lugar debe ser alfanumerico");
			return false;
		}
		return true;
	}

	function validarProvincia(){
		if(provincia.value==""){
			alert("La provincia no puede estar vacia");
			return false;
		}
		if(!validarAlfanumericos(provincia.value)){
        	alert("La provincia debe ser alfanumerica");
			return false;
		}
		return true;
	}

	function validarAlfanumericos(String){
	    var patron= /^[a-zA-Z0-9]*$/;
	    if (patron.test(String)){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	window.onload = function(){
		if (window.location.hash == "#agregado"){
			alert("El lugar se ha agregado con exito");
		}
	}