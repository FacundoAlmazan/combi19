var nacimiento=document.getElementById("nacimiento");

function validarEdad(){
	if(nacimiento.value==""){
		alert("Ingrese su fecha de nacimiento");
		return false;
	}
	year = nacimiento.value.substr(0,4);
	month = nacimiento.value.substr(-5,2);
	day = nacimiento.value.substr(-2,4);
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
		alert("Debes ser mayor de 18 años para comprar un pasaje");
		return false;
	}
	return true;
}