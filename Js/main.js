$(document).ready(init);

function init(){
    var headd = document.getElementById("head");
    var sec = document.getElementById("secciones");
    var fo = document.getElementById("foot");
    
    headd.style.display = "none";
    sec.style.display = "none";
    fo.style.display = "none";
}

function muestra(ref){
    var secc = document.getElementById(ref);
    var ensa = document.getElementById("ent_sal");
    var headd = document.getElementById("head");
    var fo = document.getElementById("foot");
    
    headd.style.display = "block";
    secc.style.display = "block";
    fo.style.display = "block";
    ensa.style.display ="none";
}
