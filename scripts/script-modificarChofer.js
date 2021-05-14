	var nombre = document.getElementById("nombre");
	var apellido = document.getElementById("apellido");
	var email = document.getElementById("email");
	var telefono = document.getElementById("telefono");

	function checkChofer(){
		return validarNombre() && validarApellido() && validarEmail() && validarTelefono();
	}

	function validarNombre(){
		if(nombre.value==""){
			alert("El nombre no puede estar vacio");
			return false;
		}
		if(!validarAlfanumericos(nombre.value)){
	        alert("El nombre debe ser alfanumerico");
			return false;
		}
		return true;
	}

	function validarApellido(){
		if(apellido.value==""){
			alert("El apellido no puede estar vacio");
			return false;
		}
		if(!validarAlfanumericos(apellido.value)){
        	alert("El apellido debe ser alfanumerico");
			return false;
		}
		return true;
	}

	function validarEmail(){
		if(email.value==""){
			alert("El email no puede estar vacío");
			return false;
		}
		return true;
	}

	function validarTelefono(){
		if(telefono.value ==""){
			alert("El telefono no puede estar vacío");
			return false;
		}
		if(!validarAlfanumericos(telefono.value)){
			alert("El telefono solo puede contener caracteres alfanumericos");
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

	function validarNumericos(Num){
    	var patron= /^[0-9]*$/;
   		if (patron.test(Num)){
        	return true;
    	}
    	else{
       	 	return false;
    	}
	}

	window.onload = function(){
		if (window.location.hash == "#agregado"){
			alert("El chofer se ha agregado con exito");
		}
	}

	window.onload = function(){
		if (window.location.hash == "#modificado"){
			alert("El chofer se ha modificado con exito");
		}
	}