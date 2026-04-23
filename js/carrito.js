document.addEventListener("scroll", function() {
    var footer = document.getElementById("footer");
    var carrito = document.getElementById("carrito");

    var footerRect = footer.getBoundingClientRect();
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

    if (footerRect.top < viewportHeight) {
        carrito.style.display = "none";  
    } else {
        carrito.style.display = "block"; 
    }
});
