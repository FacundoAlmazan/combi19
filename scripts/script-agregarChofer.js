	var nombre = document.getElementById("nombre");
	var apellido = document.getElementById("apellido");
	var email = document.getElementById("email");
	var nacimiento = document.getElementById("nacimiento");
	var telefono = document.getElementById("telefono");
	var dni = document.getElementById("dni");
	var usuario = document.getElementById("usuario");
	var clave = document.getElementById("clave");

	function checkChofer(){
		return validarNombre() && validarApellido() && validarEmail() && validarTelefono() && validarDni() && validarUsuario() && validarContraseña();
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
		if(!validarNumerosYGuiones(telefono.value)){
			alert("El telefono solo puede contener números y guiones");
			return false;
		}
		return true;
	}

	function validarDni(){
		if(dni.value < 1){
			alert("El dni no puede estar vacio");
		    estado=false;		
			return false;	
		}
		return true;
	}

	function validarUsuario(){
		if(usuario.value == ""){
			alert("ingrese su nombre de usuario");
			return false;
		}
		if(!validarAlfanumericos(usuario.value)){
			alert("el usuario solo puede tener caracteres alfanumericos");
			return false;
		}
		if(!validarTamaño(usuario.value)){
			alert("el usuario debe tener un minimo de 6 caracteres");
			return false;
		}
		return true;
	}

	function validarContraseña(){
		if(clave.value == "" ){
			alert("ingrese su contraseña");
			return false;
		}
		if(!validarTamaño(clave.value)){
			alert("el contraseña debe tener un minimo de 6 caracteres");
			return false;
		}
		return true;
	}

	function validarTamaño(String){
  		if(String.length >= 6){
    		return true;
  		}
  		else{
    		return false;
  		}
	}

	function validarAlfanumericos(String){
	    var patron= /^[a-zA-Z0-9,\s]*$/;
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

	function validarNumerosYGuiones(String){
    	var patron= /^[0-9-]+$/;
   		if (patron.test(String)){
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
		if (window.location.hash == "#errorUsuario"){
			alert("El nombre de usuario ya existe");
		}
		if (window.location.hash == "#errorMail"){
			alert("El email ya se encuentra en uso");
		}
	}