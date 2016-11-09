$(document).ready(init);

function oculta(){
    var foto_g = document.getElementById("fotog");
    var foto = document.getElementById("marco");

    foto_g.style.display = "none";
    foto.style.display = "none";
}

function fotogrande(ref){
    var foto_g = document.getElementById(ref);
    var foto = document.getElementById("marco");
    var headd = document.getElementById("head");
    
    document.getElementsByTagName("html")[0].style.overflow = "auto";
    foto_g.style.display = "none";
    foto.style.display = "none";
    headd.style.display = "block";
    return false;
}
function muestrafoto(ref){
    var foto_g = document.getElementById(ref);
    var foto = document.getElementById("marco");
    var headd = document.getElementById("head");

    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    foto_g.style.display ="block";
    foto.style.display = "block";
    headd.style.display = "none";
    return false;
}