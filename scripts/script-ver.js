window.onload = function(){
    if (window.location.hash == "#modificado"){
        alert("Se ha modificado con exito");
    }
    if(window.location.hash == "#errorRe"){
        alert("Error: Valores nombre y provincia repetidos con un lugar ya existentes");
    }
    if(window.location.hash == "#errorRu"){
        alert("Error: Este lugar forma parte de una ruta, no se puede modificar");
    }
    if(window.location.hash == "#errorMail"){
        alert("Error: Este email ya se encuentra en uso por otro usuario");
    }
    if(window.location.hash == "#errorCombId"){
        alert("Error: La identificacion se encuentra en uso");
    }
    if (window.location.hash == "#errorCombPatente"){
        alert("La patente se encuentra en uso");
    }
    if(window.location.hash == "#InsumoOcu"){
        alert("Error: El insumo forma parte de un viaje, no se puede modificar");
    }
    if (window.location.hash == "#InsumoNombre"){
        alert("Error: El nombre del insumo ya se encuentra en uso");
    }
    if (window.location.hash == "#errorTiempos"){
        alert("El viaje no se agrego porque el chofer ya realiza un viaje ese día");
    }
    if (window.location.hash == "#errorTiemposC"){
        alert("El viaje no se agrego porque la combi ya realiza un viaje ese día");
    }
}