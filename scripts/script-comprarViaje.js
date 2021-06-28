var numTarjeta= document.getElementById("numTarjeta");
var claveTarjeta= document.getElementById("claveTarjeta");
var nombreTarjeta= document.getElementById("nombreTarjeta");
var vencimientoTarjeta= document.getElementById("vencimientoTarjeta");

function validarNumTarjeta(){
    if(numTarjeta.value==""){
        alert("Ingrese número de tarjeta");
        numTarjeta.focus();
        return false;
    }
    if(!validarNumerosYEspacios(numTarjeta.value)){
        alert("El número de tarjeta solo puede contener números y espacios");
        numTarjeta.focus();
        return false;
    }
    return true;
}

function validarClaveTarjeta(){
    if(claveTarjeta.value==""){
        alert("Ingrese código de seguridad");
        return false;
    }
    if(!validarNumerosYEspacios(claveTarjeta.value)){
        alert("El código de tarjeta solo puede contener números");
        claveTarjeta.focus();
        return false;
    }
    if(!validarTamaño(claveTarjeta.value)){
        alert("El código de tarjeta debe ser de 3 dígitos");
        claveTarjeta.focus();
        return false;
    }
    return true;
}

function validarNombreTarjeta(){
    if(nombreTarjeta.value==""){
        alert("Ingrese su nombre y apellido");
        nombreTarjeta.focus();
        return false;
    }
    if(!validarMayusculasYEspacios(nombreTarjeta.value)){
        alert("El nombre y apellido solo pueden contener letras mayúsculas y espacios");
        nombreTarjeta.focus();
        return false;
    }
    return true;
}

function validarVencimientoTarjeta(){
    if(vencimientoTarjeta.value==""){
        alert("Ingrese fecha de vencimiento");
        vencimientoTarjeta.focus();
        return false;
    }
    year = vencimientoTarjeta.value.substr(0,4);
    month = vencimientoTarjeta.value.substr(-5,2);
    day = vencimientoTarjeta.value.substr(-2,4);
    intYear = parseInt(year, 10);
    intMonth = parseInt(month, 10);
    intDay = parseInt(day, 10);
    today = new Date();
    ty = today.getFullYear();
	tm = today.getMonth()+1;
    td = today.getDate();
	if ((ty < intYear) || (ty === intYear && tm < intMonth) || (ty === intYear) && (tm === intMonth) && ( td < intDay)) {
		return true;
	}
    alert("La tarjeta de crédito está vencida");
    vencimientoTarjeta.focus();
    return false;
}

function validarTamaño(String){
    if(String.length == 3){
      return true;
    }
    else{
      return false;
    }
  }

  function validarMayusculasYEspacios(String){
    var patron= /^[A-Z\s]*$/;
    if (patron.test(String)){
        return true;
    }
    else{
        return false;
    }
}

function validarNumerosYEspacios(String){
    var patron= /^[0-9\s]*$/;
    if (patron.test(String)){
        return true;
    }
    else{
        return false;
    }
}

function validarNumeros(String){
    var patron= /^[0-9]*$/;
    if (patron.test(String)){
        return true;
    }
    else{
        return false;
    }
}

function checkCompra(){
    if (vencimientoTarjeta.value!="" || claveTarjeta.value!="" || numTarjeta.value!="" || nombreTarjeta.value!=""){
        return (validarNumTarjeta() && validarClaveTarjeta() && validarNombreTarjeta() && validarVencimientoTarjeta())
    }
    else{
        return true;
    }
}