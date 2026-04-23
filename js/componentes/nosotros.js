const texto = document.getElementById("texto-animado").innerText;
document.getElementById("texto-animado").innerText = "";

let i = 0;
function mostrarTexto() {
    if (i < texto.length) {
        if (texto.charAt(i) === ' ') {
            document.getElementById("texto-animado").innerHTML += '&nbsp;'; 
        } else {
            document.getElementById("texto-animado").innerText += texto.charAt(i);
        }
        i++;
        setTimeout(mostrarTexto, 90); 
    }
}

mostrarTexto();
