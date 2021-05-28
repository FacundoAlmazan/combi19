var usuario=document.getElementById("user");
var contraseña=document.getElementById("pw");
var nacimiento=document.getElementById("nacimiento").value;
var apellido=document.getElementById("apellido");
var nombre=document.getElementById("nombre");
var dni=document.getElementById("dni");
var email= document.getElementById("email");
var estado= true;

function validarNombre(){
	if(nombre.value==""){
		alert("El nombre no puede estar vacio");
		estado=false;
		return false;
	}
	if(!validarLetrasYEspacios(nombre.value)){
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
	if(!validarLetrasYEspacios(apellido.value)){
        alert("El apellido debe ser alfanumerico");
		estado=false;
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

function validarEdad(){
	if(!nacimiento){
		alert("ingrese su fecha de nacimiento");
		return false;
	}
	year = nacimiento.substr(0,4);
	month = nacimiento.substr(-5,2);
	day = nacimiento.substr(-2,4);
	intYear = parseInt(year, 10);
	intMonth = parseInt(month, 10);
	intDay = parseInt(day, 10);
	today = new Date();
	age = today.getFullYear() - year;
	m = today.getMonth()+1 - intMonth;
	if (m<0 || (m===0 && today.getDate() < intDay)) {
		age--;
	}
	if(age < 18){
		alert("debes ser mayor de 18 años registrarte en el sitio");
		return false;
	}
	return true;
}

function validarLetrasYEspacios(String){
    var patron= /^[a-zA-Z\s]*$/;
    if (patron.test(String)){
        return true;
    }
    else{
        return false;
    }
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

function validarTamaño(String){
  if(String.length >= 6){
    return true;
  }
  else{
    return false;
  }
}

function checkRegister(){
	return validarNombre() &&  validarApellido() &&  validarEmail() &&  validarDni() &&  validarEdad() && validarUsuario() && validarContraseña();
}

