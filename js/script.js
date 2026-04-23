
const urlParams = new URLSearchParams(window.location.search);
const categoriaParam = urlParams.get('categoria');
const productoParam = urlParams.get('producto');



const categoriaSelect = document.getElementById('categoria');


if (categoriaParam) {
    categoriaSelect.value = categoriaParam;
}
let cate = categoriaParam;

categoriaSelect.addEventListener('change', (e) => {

    event.preventDefault();

    let valor = categoriaSelect.value;
    switch (valor) {
        case "1":
            location.href = `Inventario.php?categoria=1&producto=productos`;
            break;
        case "2":
            location.href = `Inventario.php?categoria=2&producto=productos`;
            break;
        case "3":
            location.href = `Inventario.php?categoria=3&producto=productos`;
            break;
        case "4":     
            location.href = `Inventario.php?categoria=4&producto=productos`;
            break;
        case "5":
            location.href = `Inventario.php?categoria=5&producto=productos`;
            break;
        default:
            location.href = `Inventario.php?categoria=categorias&producto=productos`;
            break;
    }
});

document.getElementById("botonFiltrar").addEventListener("click", function() {
    var valorInput = document.getElementById("categ").value;
    alert(valorInput);
    location.href = `Inventario.php?categoria=${cate}&producto=${valorInput}` ;
});


// Función para agregar un producto al carrito
// function agregarAlCarrito() {
    // Tu lógica para agregar el producto al carrito aquí
    
    // Incrementar el contador de productos en el carrito
    // var contadorCarrito = document.getElementById("cuenta-carrito");
    // contadorCarrito.textContent = parseInt(contadorCarrito.textContent) + 1;
// }











