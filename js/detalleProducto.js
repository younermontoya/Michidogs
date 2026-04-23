document.addEventListener("DOMContentLoaded", function() {
    var imagenesPequenas = document.querySelectorAll('.small-image');
    var imagenPrincipal = document.querySelector('.imagenPrincipal');

    imagenesPequenas.forEach(function(imagen) {
        imagen.addEventListener('click', function() {
            var nuevaSrc = imagen.getAttribute('src');

            imagenPrincipal.style.opacity = '0'; 
            setTimeout(function() {
                imagenPrincipal.src = nuevaSrc; 
                imagenPrincipal.style.opacity = '1'; 
            }, 150); 
        });
    });

    imagenPrincipal.addEventListener('click', function() {
        if (imagenPrincipal.classList.contains('zoom')) {
            imagenPrincipal.classList.remove('zoom');
        } else {
            imagenPrincipal.classList.add('zoom');
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    var cantidadSpan = document.querySelector('.cantidad-seleccionada');
    var cantidad = 0;

    document.querySelector('.cantidad').addEventListener('click', function(event) {
        var botonClicado = event.target;

        if (botonClicado.classList.contains('boton-mas')) {
            cantidad++;
        } else if (botonClicado.classList.contains('boton-menos')) {
            if (cantidad > 0) {
                cantidad--;
            }
        }

        cantidadSpan.textContent = cantidad;
    });
});
