function mostrar() {
    document.getElementById("senha").setAttribute("type", "text");
    document.getElementById("mostrar").style.display = "none";
    document.getElementById("ocultar").style.display = "block";
}
function ocultar() {
    document.getElementById("senha").setAttribute("type", "password");
    document.getElementById("ocultar").style.display = "none";
    document.getElementById("mostrar").style.display = "block";
}