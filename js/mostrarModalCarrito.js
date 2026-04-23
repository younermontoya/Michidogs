
function mostrarModal(id, nombre, precio, imagen) {
    // Llena el modal con la información del producto
    document.querySelector('#exampleModal .product-image img').src = imagen;
    document.querySelector('#exampleModal .product-title h4').textContent = nombre;
    document.querySelector('#exampleModal .product-price').textContent = '$ ' + precio;
    document.querySelector('#exampleModal .product-quantity input').value = 1; // Cantidad inicial

    // Mostrar el modal
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    modal.show();
}
