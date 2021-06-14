window.onload = function(){
    if (window.location.hash == "#modificado"){
        alert("Se ha modificado con exito");
    }
    if(window.location.hash == "#errorRe"){
        alert("Error: Valores nombre y provincia repetidos con un lugar ya existentes");
    }
}