<?php
function mostrarProductosPorCategoria($categoria) {
    // Crear una instancia de la clase Conexion y obtener la conexión
    $conexion = new Conexion();
    $db = $conexion->get_conexion();

    try {
        // Preparar la consulta SQL
        $stmt = $db->prepare("SELECT * FROM productos WHERE pro_categoria = :categoria");
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->execute();
        
        // Mostrar productos
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Formatear el precio con 2 decimales
                $precio = number_format($row['pro_precio'], 0, '.', ',');

                echo '
                <div class="col-md-3 productosIndex">
                    <div class="product-card">
                        <a href="../../views/users/detalleProducto.php?id=' . $row['pro_id'] . '">
                            <img src="' . $row['pro_img'] . '" alt="Producto ' . htmlspecialchars($row['pro_nombre']) . '" height="200px" width="130px">
                        </a>
                        <h5 class="mt-3">' . htmlspecialchars($row['pro_nombre']) . '</h5>
                        <p>$ ' . $precio . '</p>
                        <button class="botonAgregar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . htmlspecialchars($row['pro_id']) . '" data-nombre="' . htmlspecialchars($row['pro_nombre']) . '" data-precio="' . htmlspecialchars($precio) . '" data-imagen="' . htmlspecialchars($row['pro_img']) . '" >Agregar al carrito</button>                    
                    </div>
                </div>
            ';
            }
        } else {
            echo "<p>No hay productos para esta categoría.</p>";
        }
    } catch (PDOException $e) {
        // Mostrar mensaje de error en caso de excepción
        echo "Error: " . $e->getMessage();
    }
}
?>
