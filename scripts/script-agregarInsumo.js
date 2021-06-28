    var nombre = document.getElementById("nombre");
	var precio = document.getElementById("precio");
	var tipo = document.getElementById("tipo");
    
	function checkInsumo(){
		return (validarPrecio() && validarNombre() && validarTipo());
	}

	function validarNombre(){
		if(nombre.value == ""){
			alert("El nombre no puede estar vacío");
			return false;
		}
		if(!validarLetrasNumerosEspacios(modelo.value)){
			alert("El modelo solo puede contener caracteres alfanuméricos");
			return false;
		}
		return true;
	}

	function validarPrecio(){
		if(precio.value == ""){
			alert("Ingrese un precio");
			return false;
		}
		return true;
	}


	function validarTipo(){
		if(tipo.value =="x"){
			alert("Selecciona un tipo de insumo");
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
			alert("El insumo se ha agregado con exito");
		}
		if (window.location.hash == "#InsumoNombre"){
			alert("Error: El nombre del insumo ya esta en uso");
		}
	}