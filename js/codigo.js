
document.addEventListener("DOMContentLoaded" ,cargareventos);
function cargareventos(){
    document.getElementById("btnGuardar").addEventListener('click', validarCodigoPostal)
}

function validarCodigoPostal(e){
   
        var valorCP = document.getElementById("cp").value;
    
        if(valorCP.length>5 || valorCP.length<5  ){
            e.preventDefault();
            document.getElementById("cp").style.borderBlockColor= "red";
        }
        /*if(isNaN(valorCP)){
            e.preventDefault();
            document.getElementById("cp").style.borderBlockColor= "red";
        }*/
           
    }
