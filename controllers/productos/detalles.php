<?php
function mostrarProducto($id) {

    // Crear una instancia de la clase Conexion y obtener la conexión
    $conexion = new Conexion();
    $pdo = $conexion->get_conexion();

    // Preparar la consulta SQL
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE pro_id = :id");
    $stmt->execute(['id' => $id]);

    // Obtener el resultado
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Formatear el precio con 2 decimales
        $precio = number_format((float)$producto['pro_precio'], 0, '.', ',');

        echo '
    <div class="productos-container">    
        <div class="col-md-3 productosIndex">
            <div class="product-card">
                <a href="../../views/users/detalleProducto.php?id=' . htmlspecialchars($producto['pro_id']) . '">
                    <img src="' . htmlspecialchars($producto['pro_img']) . '" alt="Producto 1" height="200px" width="130px">
                </a>
                <h5 class="mt-3">' . htmlspecialchars($producto['pro_nombre']) . '</h5>
                <p>$ ' . htmlspecialchars($precio) . '</p>
                <button 
                    class="botonAgregar"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    data-id="' . htmlspecialchars($producto['pro_id']) . '"
                    data-nombre="' . htmlspecialchars($producto['pro_nombre']) . '"
                    data-precio="' . htmlspecialchars($precio) . '"
                    data-imagen="' . htmlspecialchars($producto['pro_img']) . '"
                >Agregar al carrito</button>
            </div>
        </div>
    </div>';
    } else {        
        echo "<script>
        alert('El producto no a sido encontrado');
        location.href='../../views/users/productos.php';
      </script>";  
    }
}
?>
