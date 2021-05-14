var usuario=document.getElementById("user");
var contraseña=document.getElementById("pw");
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

function checkLogin(){
	return validarUsuario()&&validarContraseña();
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

window.onload = function () {
	horaA = new Date();
	switch (window.location.hash) {
	case "#pass-wrong":
	   alert("Contraseña incorrecta.");
	   break;
   case "#user-wrong":
		alert("Usuario incorrecto.");
		break;
	}
}