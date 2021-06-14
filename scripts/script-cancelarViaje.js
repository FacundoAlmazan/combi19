var fecha =document.getElementById("fecha").innerText;

function checkCancelar(){
    year = fecha.substr(0,4);
    month = fecha.substr(-5,2);
    day = fecha.substr(-2,4);
    intYear = parseInt(year, 10);
    intMonth = parseInt(month, 10);
    intDay = parseInt(day, 10);
    today = new Date();
    ty = today.getFullYear();
	tm = today.getMonth()+1;
    td = today.getDate();

    dd= day - td;
    if(year == ty && month == tm && dd == 0){
        alert("Condiciones de reembolso: Dado que faltan menos de 24 horas para el viaje, no se te devolverá el monto");
    }
    else{
        if(year == ty && month == tm && dd == 1){
            alert("Condiciones de reembolso: Dado que faltan entre 24 y 48 horas para el viaje, se te devolverá el 50% del monto");
        }
        else{
            if((year == ty && month == tm && dd >=2)||(year == ty && month > tm)||(year > ty)){
                alert("Condiciones de reembolso: Dado que faltan más de 48 horas para el viaje, se te devolverá la totalidad del monto");
            }
        }
    }
}