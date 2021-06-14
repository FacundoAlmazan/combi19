var comentario = document.getElementById("comentario");

function checkComentario(){
    if(comentario.value==""){
        alert("El comentario no puede estar vacio");
        return false;
    }
    if(!validarTamaño(comentario.value)){
        alert("El comentario no puede sobrepasar los 144 caracteres");
        return false;
    }
    return true;
}

function validarTamaño(String){
    if(String.length <= 144){
      return true;
    }
    else{
      return false;
    }
  }

  window.onload = function(){
    if (window.location.hash == "#modificado"){
        alert("El comentario se ha modificado");
    }
    if (window.location.hash == "#eliminado"){
      alert("El comentario se ha eliminado");
  }
}