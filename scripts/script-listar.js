window.onload = function(){
    if (window.location.hash == "#modificado"){
        alert("Se ha modificado con exito");
    }
    if (window.location.hash == "#errorRepetidoRuta"){
        alert("No se puede crear una ruta con los campos origen, destino y combi iguales a una existente");
    }
    if (window.location.hash == "#errorOrigDest"){
        alert("El origen y destino no pueden ser iguales");
    }
}