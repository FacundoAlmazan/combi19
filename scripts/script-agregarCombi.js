	var modelo = document.getElementById("modelo");
	var patente = document.getElementById("patente");
	var cantasientos = document.getElementById("cantasientos");
	var id = document.getElementById("id");
	var chofer = document.getElementById("chofer");
	var tipo = document.getElementById("tipo");

	function checkCombi(){
		return (validarModelo() && validarPatente() && validarAsientos() && validarId() && validarChofer() && validarTipo());
	}

	function validarModelo(){
		if(modelo.value==""){
			alert("El modelo no puede estar vacío");
			estado=false;
			return false;
		}
		return true;
	}

	function validarPatente(){
		if(patente.value ==""){
			alert("El patente no puede estar vacío");
			return false;
		}
		if(!validarLetrasNumerosEspacios(patente.value)){
			alert("El patente solo puede contener caracteres alfanumericos");
			return false;
		}
		return true;
	}

	function validarAsientos(){
		if(cantasientos.value ==""){
			alert("La cantidad de asientos no puede estar vacía");
			return false;
		}
		if(!validarNumericos(cantasientos.value)){
			alert("La cantidad de asientos solo puede contener caracteres numericos");
			return false;
		}
		return true;
	}

	function validarId(){
		if(id.value ==""){
			alert("El id no puede estar vacío");
			return false;
		}
		if(!validarLetrasNumerosEspacios(id.value)){
			alert("El id solo puede contener caracteres alfanumericos");
			return false;
		}
		return true;
	}

	function validarChofer(){
		if(chofer.value =="x"){
			alert("Selecciona un chofer");
			return false;
		}
		return true;
	}

	function validarTipo(){
		if((tipo.value != "comoda") && (tipo.value != "super-comoda")){
			alert("Ingresa un tipo valido: comoda o super-comoda");
			return false;
		}
		return true;
	}

	function validarLetrasNumerosEspacios(String){
		var patron= /^[a-zA-Z0-9\s]*$/;
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
			alert("La combi se ha agregado con exito");
		}
		if (window.location.hash == "#errorId"){
			alert("La identificación se encuentra en uso");
		}
        if (window.location.hash == "#errorPatente"){
			alert("La patente se encuentra en uso");
		}
	}