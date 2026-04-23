document.addEventListener('DOMContentLoaded', async function() {
    try {
        // Realizar una solicitud GET para obtener los productos
        const response = await axios.get('http://10.175.144.95:8080/productos');

        // Obtener los datos de los productos desde la respuesta
        const productos = response.data;

        // Referencia a la tabla
        const tabla = $('#tabla').DataTable(); // Inicializar DataTables

        // Iterar sobre cada producto y agregarlo a la tabla
        productos.forEach(producto => {
            tabla.row.add([
                producto.id,
                producto.nombre,
                producto.marca,
                producto.precio,
                producto.estado,
                producto.cantidad_min,
                producto.cantidad_max,
                '<button class="btn btn-warning editar">Editar</button>',
                '<button class="btn btn-warning">Eliminar</button>'
            ]).draw();
        });

        // Evento que aparezca el modal 
        $('#tabla').on('click', '.editar', function() {
            const fila = $(this).closest('tr');

            const idProducto = fila.find('td:eq(0)').text();
            const nombreProducto = fila.find('td:eq(1)').text();
            const marcaProducto = fila.find('td:eq(2)').text();
            const precioProducto = fila.find('td:eq(3)').text();
            const estadoProducto = fila.find('td:eq(4)').text();
            const cantidadMinProducto = fila.find('td:eq(5)').text();
            const cantidadMaxProducto = fila.find('td:eq(6)').text();

            $('#nombre-producto').val(nombreProducto);
            $('#marca').val(marcaProducto);
            $('#precio').val(precioProducto);
            $('#estado').val(estadoProducto);
            $('#cantidad-min').val(cantidadMinProducto);
            $('#cantidad-max').val(cantidadMaxProducto);
            
            $('#exampleModal').modal('show');
        });

        
        $('#formEditar').submit(async function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            
            // Obtener los datos del formulario
            const formData = $(this).serialize();
            
            try {
                // Realizar una solicitud POST para actualizar el producto
                const response = await axios.post('URL_DE_TU_API_PARA_ACTUALIZAR_PRODUCTO', formData);
                
                // Manejar la respuesta (por ejemplo, mostrar un mensaje de éxito)
                alert('Producto actualizado exitosamente');
                
                // Opcional: recargar la página o actualizar la tabla de productos
                // window.location.reload();
                // tabla.clear().draw();
                // Luego, volver a cargar los datos de los productos y agregarlos a la tabla
            } catch (error) {
                console.error('Error al actualizar el producto:', error);
                alert('Error al actualizar el producto');
            }
        });
    } catch (error) {
        console.error('Error al obtener los productos:', error);
        alert('Error al obtener los productos');
    }
    
});


