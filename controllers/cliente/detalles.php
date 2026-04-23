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
        $precio = number_format($producto['pro_precio'], 0, '.', ',');

        echo '
<div class="productos-container">
    <div class="col-md-3 productosIndex">
        <div class="product-card">
            <a href="../../views/clientes/detalleProductoC.php?id=' . $producto['pro_id'] . '">
                <img src="' . $producto['pro_img'] . '" alt="Producto 1" height="200px" width="130px">
            </a>
            <h5 class="mt-3">' . $producto['pro_nombre'] . '</h5>
            <p>$ ' . $precio . '</p>
            <button class="botonAgregar" onclick="mostrarModal(' . $producto['pro_id'] . ',' . $producto['pro_precio'] . ')">Agregar al carrito</button>
        </div>
    </div>
</div>
';
    } else {
        echo "<script>
        alert('El producto no a sido encontrado');
        location.href='../../views/clientes/productosC.php';
      </script>";  
    }
}
?>
