var ruta = document.getElementById("ruta");
var precio = document.getElementById("precio");
var fecha = document.getElementById("fecha");
var hora = document.getElementById("hora");

function checkViaje(){
    return validarRuta() && validarPrecio() && validarFecha() && validarHora();
}

function validarRuta(){
    if(ruta.value =="x"){
        alert("Selecciona una ruta");
        return false;
    }
    return true;
}

function validarPrecio(){
    if(precio.value==""){
        alert("Ingresa el precio");
        return false;
    }
    return true;
}

function validarFecha(){
    if(fecha.value==""){
        alert("Ingrese fecha");
        return false;
    }
    year = fecha.value.substr(0,4);
    month = fecha.value.substr(-5,2);
    day = fecha.value.substr(-2,4);
    intYear = parseInt(year, 10);
    intMonth = parseInt(month, 10);
    intDay = parseInt(day, 10);
    today = new Date();
    ty = today.getFullYear();
	tm = today.getMonth()+1;
    td = today.getDate();
	if ((ty < intYear) || (ty === intYear && tm < intMonth) || (ty === intYear) && (tm === intMonth) && ( td <= intDay)) {
		return true;
	}
    alert("La fecha debe ser mayor a la fecha de hoy");
    return false;
}

function validarHora(){
    if(hora.value==""){
        alert("Ingresa una hora");
        return false;
    }
    if(!validarFormatoHora(hora.value)){
        alert("La hora debe cumplir con el formato HH:MM:SS");
        return false;
    }
    return true;
}

function validarFormatoHora(Duracion){
    var patron = /^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/;
    if (patron.test(Duracion)){
        return true;
    }
    else{
        return false;
    }
}


window.onload = function(){
    if (window.location.hash == "#agregado"){
        alert("El viaje se ha agregado con exito");
    }
    if (window.location.hash == "#errorTiempos"){
        alert("El viaje no se agrego porque el chofer ya realiza un viaje ese día");
    }
    if (window.location.hash == "#errorTiemposC"){
        alert("El viaje no se agrego porque la combi ya realiza un viaje ese día");
    }
}