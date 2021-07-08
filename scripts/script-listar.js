window.onload = function(){
    if (window.location.hash == "#modificado"){
        alert("Se ha modificado con exito");
    }
    if (window.location.hash == "#errorRepetidoRuta"){
        alert("No se puede crear una ruta con los campos origen, destino y combi iguales a una existente");
    }
    if(window.location.hash == "#errorRe"){
        alert("Error: Valores nombre y provincia repetidos con un lugar ya existentes");
    }
    if (window.location.hash == "#errorTiempos"){
        alert("El viaje no se agrego porque el chofer ya realiza un viaje ese día");
    }
}