var usuario=document.getElementById("user");
var contraseña=document.getElementById("pw");
var nacimiento=document.getElementById("nacimiento");
var apellido=document.getElementById("apellido");
var nombre=document.getElementById("nombre");
var dni=document.getElementById("dni");
var email= document.getElementById("email");
var estado= true;
function validarDni(){
	if(dni.value < 1){
		alert("El dni no puede estar vacio");
	    estado=false;		
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
	if(contraseña.value == "" ){
		alert("ingrese su contraseña");
		return false;
	}
	if(!validarTamaño(contraseña.value)){
		alert("el contraseña debe tener un minimo de 6 caracteres");
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
function validarNombre(){
	if(nombre.value==""){
		alert("El nombre no puede estar vacio");
		estado=false;
		return false;
	}
	if(!validarAlfanumericos(nombre.value)){
        alert("El nombre debe ser alfanumerico");
		estado=false;
		return false;
	}
	return true;
}
function validarApellido(){
	if(apellido.value==""){
		alert("El apellido no puede estar vacio");
		estado=false;
		return false;
	}
	if(!validarAlfanumericos(apellido.value)){
        alert("El apellido debe ser alfanumerico");
		estado=false;
		return false;
	}
	return true;
}
function validadEdad(){
	var anio= nacimiento.getFullYear();
	if ((anio < 2004) && (anio > 1800)){
		alert("Aniooo biieen");
		return false;
	}
	else{
		alert("anio maaal :c");
		return false;
	}
}
function validarEdad2(){
	var AnyoFecha = nacimiento.getFullYear();
	var MesFecha = nacimiento.getMonth();
	var DiaFecha = nacimiento.getDate();
	horaA = new Date();
	horaA = Date.now();
	var AnyoLim = 2003;
	if (AnyoFecha>1000){
		if(AnyoLim>AnyoFecha){
			alert(horaA);
			return true;
		}
		else{
			alert("No se pueden registrar menores de edad");
			return false;
		}
	}
	else{
		alert("Proporcione una fecha valida");
		return false;
	}
}


function validarTamaño(String){
  if(String.length >= 6){
    return true;
  }
  else{
    return false;
  }
}

function checkRegister(){
	return validarNombre() && validarApellido() && validarEmail() && validarDni() && validadEdad();
}

